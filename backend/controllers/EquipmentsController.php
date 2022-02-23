<?php

namespace backend\controllers;

use Yii;
use common\models\Equipment;
use common\models\EquipmentSearch;
use common\models\Corridor;
use common\models\EquipmentName;
use common\models\StationCode;
use common\models\Level;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * EquipmentsController implements the CRUD actions for Equipment model.
 */
class EquipmentsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create', 'update', 'delete', 'view', 'equipmentlist', 'stationlist', ],
                        'roles' => ['operator'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index'],
                    ],                    
                ],
            ],
        ];
    }

    /**
     * Lists all Equipment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EquipmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Equipment model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Equipment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Equipment();

        $itemCorridors = ArrayHelper::map(Corridor::find()->all(), 'corr_id', 'corr_name');
        //$itemStationCodes = ArrayHelper::map(StationCode::find()->orderBy('station_name')->all(), 'stn_id', 'station_name');
        $itemEquipmentNames = ArrayHelper::map(EquipmentName::find()->orderBy('ename_name')->all(), 'ename_id', 'ename_name');
        $itemLevels = ArrayHelper::map(Level::find()->all(), 'level_id', 'level_name');

        $this->view->params['itemCorridors'] = $itemCorridors;
        //$this->view->params['itemStationCodes'] = $itemStationCodes;
        $this->view->params['itemEquipmentNames'] = $itemEquipmentNames;
        $this->view->params['itemLevels'] = $itemLevels;

        $stationSelected = '';
        $corridorSelected = '';
        $equipmentSelected = '';
        $levelSelected = '';
        

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $stn_id = $model['stn_id'];
            $corr_id = $model['corr_id'];
            $ename_id = $model['ename_id'];
            $enos_id = $model['enos_id'];
            $level_id = $model['level_id'];
            
            $stationSelected = (string) StationCode::findOne($stn_id)['station_name'];
            $corridorSelected = (string) Corridor::findOne($corr_id)['corr_name'];
            $equipmentSelected = (string) EquipmentName::findOne($ename_id)['ename_name'];
            $levelSelected = (string) Level::findOne($level_id)['level_name'];

            $model->asset_code = str_pad($corr_id,2,'0',STR_PAD_LEFT) . str_pad($stn_id,4,'0',STR_PAD_LEFT). str_pad($ename_id,4,'0',STR_PAD_LEFT) . str_pad($enos_id,4,'0',STR_PAD_LEFT) . str_pad($level_id,2,'0',STR_PAD_LEFT);
            
            Yii::$app->session->setFlash('success', '\'Asset Code\' ' . $model->asset_code . ' is generated for ' . $equipmentSelected . ' equipment alloted number ' . $enos_id . ' at ' . $stationSelected . ' of ' . $corridorSelected . ', located in station at ' . $levelSelected,  $removeAfterAccess = false);
            if($model->save())
                return $this->redirect(['view', 'id' => $model->equip_id]);
        } else {
            return $this->render('create', [
                    'model'=>$model, 
                    'itemCorridors'=>$itemCorridors, 
                    //'itemStationCodes'=>$itemStationCodes,
                    'itemEquipmentNames'=>$itemEquipmentNames, 
                    'itemLevels'=>$itemLevels,
                ]);
        }
    }

    /*
    * This method will populate the dropdown list with the manufacturers of the choosen equipment
    */
    public function actionEquipmentlist($id)
    {
        $rows = \common\models\Manufacturer::find()
                ->where(['ename_id' => $id])
                ->all();
 
        echo "<option>Select Equipment Manufacturer</option>";
 
        if(count($rows)>0){
            foreach($rows as $row){
                echo "<option value='$row->manuf_id'>$row->name</option>";
            }
        }
        else{
            echo "<option>-</option>";
        }
 
    }

    /*
    * This method will populate the dropdown list with the stations of the choosen corridor
    */
    public function actionStationlist($id)
    {
        $rows = \common\models\StationCode::find()
                ->where(['corr_id' => $id])
                ->all();
 
        echo "<option>Select Corridor Station</option>";
 
        if(count($rows)>0){
            foreach($rows as $row){
                echo "<option value='$row->stn_id'>$row->station_name</option>";
            }
        }
        else{
            echo "<option>-</option>";
        }
 
    }
    /**
     * Updates an existing Equipment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->equip_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Equipment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Equipment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Equipment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Equipment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
