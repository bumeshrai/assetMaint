<?php

namespace frontend\controllers;

use Yii;
use common\models\OheProgress;
use common\models\OheProgresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OheProgressController implements the CRUD actions for OheProgress model.
 */
class OheProgressController extends Controller
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
     * Lists all OheProgress models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OheProgresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OheProgress model.
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
     * Creates a new OheProgress model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OheProgress();

        $direction = ['up'=>'Up','dn'=>'Down','stn'=>'Station'];
        $this->view->params['direction'] = $direction;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ohe_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing OheProgress model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ohe_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing OheProgress model.
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
     * Finds the OheProgress model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OheProgress the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OheProgress::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionTensionlength()
    {
        $model = new OheProgress();
        $section = OheProgress::find()->select(['ohe_id','section', 'tension_number'])->where(['work_completed' => 0])->all();

        $sectionTensionLength = array();

        foreach($section as $record) {
             $sectionTensionLength[$record['ohe_id']] =  $record['section'] . " and Tension length " . $record['tension_number'];
        }

        $this->view->params['sectionTensionLength'] = $sectionTensionLength;

        if (Yii::$app->request->post()) {
            $id = Yii::$app->request->post()['section'];
            $model = OheProgress::findOne($id);
            
            return $this->render('progress', [
                'model' => $model,
                ]);
        } else {
            return $this->render('tensionlength', [
                'model' => $model,
                'sectionTensionLength' => $sectionTensionLength,
                ]);
        }
    }
}
