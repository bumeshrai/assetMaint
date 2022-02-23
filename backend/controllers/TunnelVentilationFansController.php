<?php

namespace backend\controllers;

use Yii;
use common\models\TunnelVentilationFan;
use common\models\TunnelVentilationFanSearch;
use common\models\MaintenanceFrequency;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * TunnelVentilationFansController implements the CRUD actions for TunnelVentilationFan model.
 */
class TunnelVentilationFansController extends Controller
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
     * Lists all TunnelVentilationFan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TunnelVentilationFanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TunnelVentilationFan model.
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
     * Creates a new TunnelVentilationFan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TunnelVentilationFan();

        $itemMaintenanceFrequency = ArrayHelper::map(MaintenanceFrequency::find()->orderBy('freq_id')->all(), 'freq_id', 'frequency');
        $this->view->params['itemMaintenanceFrequency'] = $itemMaintenanceFrequency;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tvf_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'itemMaintenanceFrequency'=>$itemMaintenanceFrequency, 
            ]);
        }
    }

    /**
     * Updates an existing TunnelVentilationFan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tvf_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TunnelVentilationFan model.
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
     * Finds the TunnelVentilationFan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TunnelVentilationFan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TunnelVentilationFan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
