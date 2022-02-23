<?php

namespace backend\controllers;

/**
 * MaintenanceNextDuesController implements the CRUD actions for MaintenanceNextDue model. 
 * The model tracks all the scheduled maintenance for the asset. 
 *
 * B. Umesh Rai
 */

use Yii;
use common\models\MaintenanceNextDue;
use common\models\MaintenanceNextDueSearch;
use common\models\Equipment;
use common\models\LocateApiController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;


class MaintenanceNextDuesController extends Controller
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
        ];
    }

    /**
     * Lists all MaintenanceNextDue models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaintenanceNextDueSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MaintenanceNextDue model.
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
     * Creates a new MaintenanceNextDue model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MaintenanceNextDue();

        // Pass on the asset code array ordered by equipment id
        $itemEquipment = ArrayHelper::map(Equipment::find()->orderBy('equip_id')->all(), 'asset_code', 'asset_code');
        $this->view->params['itemEquipment'] = $itemEquipment;

        // Pass on the controller name, used by Api Controller. This will usually be the equipment name
        $itemLocateApiController = ArrayHelper::map(LocateApiController::find()->orderBy('equipment_name')->all(),  'view_name', 'equipment_name');
        $this->view->params['itemLocateApiController'] = $itemLocateApiController;

        if ($model->load(Yii::$app->request->post())  && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'itemEquipment'=>$itemEquipment, 
                'itemLocateApiController'=>$itemLocateApiController, 
            ]);
        }
    }

    /**
     * Updates an existing MaintenanceNextDue model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MaintenanceNextDue model.
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
     * Finds the MaintenanceNextDue model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MaintenanceNextDue the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MaintenanceNextDue::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
