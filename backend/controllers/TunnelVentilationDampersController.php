<?php

namespace backend\controllers;

use Yii;
use common\models\TunnelVentilationDamper;
use common\models\TunnelVentilationDamperSearch;
use common\models\MaintenanceFrequency;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * TunnelVentilationDampersController implements the CRUD actions for TunnelVentilationDamper model.
 */
class TunnelVentilationDampersController extends Controller
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
     * Lists all TunnelVentilationDamper models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TunnelVentilationDamperSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TunnelVentilationDamper model.
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
     * Creates a new TunnelVentilationDamper model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TunnelVentilationDamper();

        $itemMaintenanceFrequency = ArrayHelper::map(MaintenanceFrequency::find()->orderBy('freq_id')->all(), 'freq_id', 'frequency');
        $this->view->params['itemMaintenanceFrequency'] = $itemMaintenanceFrequency;
 
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tvd_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'itemMaintenanceFrequency'=>$itemMaintenanceFrequency, 
            ]);
        }
    }

    /**
     * Updates an existing TunnelVentilationDamper model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->tvd_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TunnelVentilationDamper model.
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
     * Finds the TunnelVentilationDamper model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TunnelVentilationDamper the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TunnelVentilationDamper::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
