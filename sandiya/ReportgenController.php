<?php

namespace backend\controllers;

use Yii;
use common\models\Breakdown;
use common\models\ReportgenSearch;
use common\models\BdreportSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use kartik\mpdf\Pdf;


class ReportgenController extends Controller
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
                        'actions' => ['userreq','countreport','countrpt',
                        'pdf','countbd','print','report','reportgen','view','lists', 'index',],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create', 'view', 'delete', 'update',],
                        'roles' => ['operator'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BdreportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * @return mixed
     */
    public function actionCountbd()
    {
        $searchModel = new ReportgenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('countbd', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUserreq(){
      if(isset($_GET['button1'])){
        return $this->actionIndex();}
      if(isset($_GET['button2'])){
        return $this->actionReportgen();}
      if(isset($_GET['button3'])){
        return $this->actionCountbd();}
      if(isset($_GET['button4'])){
        return $this->actionCountrpt();}
    }
    /**
     * @return mixed
     */
    public function actionCountreport()
    {
        $searchModel = new ReportgenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('countreport', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * @return mixed
     */
    public function actionPrint()
    {
       $searchModel = new BdreportSearch();
       $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('print', [
           'searchModel' => $searchModel,
           'dataProvider' => $dataProvider,

       ]);
    }

    /**
     * @return mixed
     */
    public function actionReportgen() {
       $searchModel = new BdreportSearch();
       $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
       $dataProvider->pagination = false;
       $content = $this->renderPartial('print' ,[
       'searchModel' => $searchModel,
       'dataProvider' => $dataProvider,

    ]);
      // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}',
             // set mPDF properties on the fly
            'options' => ['title' => 'Krajee Report Title'],
             // call mPDF methods on the fly
            'methods' => [
              'SetHeader' => ['CMRL Maintanence||Generated On: ' . date('d.m.y')],
              'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }
    /**
     * @return mixed
     */
    public function actionCountrpt() {
       $searchModel = new ReportgenSearch();
       $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
       $dataProvider->pagination = false;
       $content = $this->renderPartial('countreport' ,[
       'searchModel' => $searchModel,
       'dataProvider' => $dataProvider,
       ]);
      // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => 'Krajee Report Title'],
            'methods' => [
              'SetHeader' => ['CMRL Maintanence||Generated On: ' . date('d.m.y')],
              'SetFooter'=>['{PAGENO}'],
            ]
            ]);
         return $pdf->render();
    }

    /**
     * Finds the Breakdown model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Breakdown the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*protected function findModel($id)
    {
        if (($model = Breakdown::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }*/

  }
