<?php

namespace backend\controllers;

use Yii;
use common\models\Ahu;
use common\models\AhuSearch;
use common\models\MaintenanceFrequency;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * AhusController implements the CRUD actions for Ahu model.
 */
class AhusController extends Controller
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
     * Lists all Ahu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AhuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ahu model.
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
     * Creates a new Ahu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ahu();

        $itemMaintenanceFrequency = ArrayHelper::map(MaintenanceFrequency::find()->orderBy('freq_id')->all(), 'freq_id', 'frequency');
        $this->view->params['itemMaintenanceFrequency'] = $itemMaintenanceFrequency;

        // Check if the values entered is for Master List
        if ($model->load(Yii::$app->request->post()) && ($model->freq_id > 0 && $model->freq_id < 10)) {
            // Enter default list for Master List
            $model->asset_code = 'master';
            $model->contractor = 'master';
            $model->maint_type_id = $model->freq_id;
            $model->description = MaintenanceFrequency::find()->where(['freq_id' => $model->freq_id])->one()->description;
            
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->ahu_id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'itemMaintenanceFrequency'=>$itemMaintenanceFrequency, 
            ]);
        }
    }

    /**
     * Updates an existing Ahu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ahu_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ahu model.
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
     * Finds the Ahu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ahu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ahu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
