<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Breakdown;
use common\models\BreakdownSearch;
use common\models\Corridor;
use common\models\EquipmentName;
use common\models\StationCode;
use common\models\Level;
use common\models\SmsRecipient;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * BreakdownsController implements the CRUD actions for Breakdown model.
 */
class BreakdownsController extends Controller
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
                        'actions' => [ 'lists',],
                        'roles' => ['operator'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create', 'view', 'delete', 'update', 'stationlist',
                            'monthly-reading', 'station-fault', 'equipment-fault'],
                    ],                    
                ],
            ],
        ];
    }

    /**
     * Lists all Breakdown models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BreakdownSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Breakdown model.
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
     * Creates a new Breakdown model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
    {
        $model = new Breakdown();

        $itemCorridors = ArrayHelper::map(Corridor::find()->all(), 'corr_id', 'corr_name');
        //$itemStationCodes = ArrayHelper::map(StationCode::find()->orderBy('station_name')->all(), 'stn_id', 'station_name');
        $itemEquipmentNames = ArrayHelper::map(EquipmentName::find()->orderBy('dept_id')
            ->all(), 'ename_id', 'ename_name');
        $itemLevels = ArrayHelper::map(Level::find()->all(), 'level_id', 'level_name');

        $this->view->params['itemCorridors'] = $itemCorridors;
        //$this->view->params['itemStationCodes'] = $itemStationCodes;
        $this->view->params['itemEquipmentNames'] = $itemEquipmentNames;
        $this->view->params['itemLevels'] = $itemLevels;

       /* $stationSelected = '';
        $corridorSelected = '';
        $equipmentSelected = '';
        $levelSelected = '';*/

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $stn_id = $model['stn_id'];
            if ( $stn_id == 'prompt')
                return $this->redirect('create');
            $corr_id = $model['corr_id'];
            $ename_id = $model['ename_id'];
            $enos_id = $model['enos_id'];
            $level_id = $model['level_id'];
            
            /*$stationSelected = (string) StationCode::findOne($stn_id)['station_name'];
            $corridorSelected = (string) Corridor::findOne($corr_id)['corr_name'];
            $equipmentSelected = (string) EquipmentName::findOne($ename_id)['ename_name'];
            $levelSelected = (string) Level::findOne($level_id)['level_name'];*/

            $model->asset_code = str_pad($corr_id,2,'0',STR_PAD_LEFT) . str_pad($stn_id,4,'0',STR_PAD_LEFT). str_pad($ename_id,4,'0',STR_PAD_LEFT) . str_pad($enos_id,4,'0',STR_PAD_LEFT) . str_pad($level_id,2,'0',STR_PAD_LEFT);
            $model['reporting_time'] = time();
            $model['attended'] = 0;
            $model['dept_id'] = EquipmentName::findOne($ename_id)['dept_id']; // Enter the department

            $message = 'Equipment with asset code \'' . $model->asset_code . '\' is under breakdown. '. $model['bd_description'];
            
            Yii::$app->session->setFlash('success', $message, $removeAfterAccess = false);
            if($model->save()) {
                // Comment out in localhost to stop sending SMS
                $this->sendSms($message, $ename_id);
                //$this->testMessage($message, $ename_id);
                return $this->redirect(['view', 'id' => $model->bd_id]);
            }
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


    /**
     * Updates an existing Breakdown model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->bd_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Breakdown model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['create']);
    }

    /**
     * Finds the Breakdown model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Breakdown the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Breakdown::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
    * This is the API code for sending SMS of TextLocal service.
    * Parameters to be passed on to the service are mobile nos. and message.
    * Mobile nos connected to the equipment are stored in sms_recepient table
    */

    public function sendSms($message, $ename_id)
    {

        // The SMS account is maintained by Madhavan
        $username = "jgmle@cmrl.gov.in";
        $hash = "c9d04f5cecc9a8dcadf218489b48b29df2f6d1c6";

        /// Message details
        $numbers = array();

        // Retrieve mobile nos for the equipment
        $smsRecipient = SmsRecipient::find()->select('mobile')->where(['ename_id' => $ename_id])->all();

        //Save the numbers in array as int
        foreach($smsRecipient as $record) {
            // Remove the leading "+", and convert to integer
            array_push($numbers, substr($record["mobile"], 1) + 0);
        }

        $sender = urlencode('VACTEL');
        $message = rawurlencode($message);
     
        // Glue the number with a comma
        $numbers = implode(',', $numbers);
     
        // Prepare data for POST request
        $data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
     
        // Send the POST request with cURL
        $ch = curl_init('http://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        
        // Process your response here
        //echo $response;
    }

    /**
    * This is a test module, wherein all the parameters to be sent to the SMS are tested.
    * Test in such module if your SMS account is limited.
    */

    public function testMessage($message, $ename_id) 
    {
        echo $message , '<br>';
        echo $ename_id , '<br>';

        $numbers = array();

        $smsRecipient = SmsRecipient::find()->select('mobile')->where(['ename_id' => $ename_id])->all();
        foreach($smsRecipient as $record) {
            echo substr($record["mobile"], 1) + 0, '<br>';
            array_push($numbers, substr($record["mobile"], 1) + 0);
        }
        print_r($numbers);
    }


    /**
    * The database is queried to fetch the records, grouped monthly for Lift and Escalator seperately.
    * The retrieved then merged using mergeRecords function.
    */
    public function actionMonthlyReading()
    {
        $model = new Breakdown();
        $mergeResult = array();

        $lfailure = Breakdown::find()
        ->select(['DATE_FORMAT(FROM_UNIXTIME(reporting_time),  "%b-%Y") AS MONTH', 
            'COUNT(1) AS FAIL', '(SUM(  `repaired_time` ) - SUM(  `reporting_time` ))  AS REPAIR' ])
        ->where(['SUBSTRING(`asset_code`,9,2)' => '18',])
        ->andWhere(['resp_contractor' => '1', 'classify_BD' => '1'])
        ->andWhere(['not', ['repaired_time' => null]])
        ->groupBy(['DATE_FORMAT( FROM_UNIXTIME( reporting_time ) ,  "%b-%Y")'])
        ->orderBy(['reporting_time' => SORT_ASC])
        ->all();

        $efailure = Breakdown::find()
        ->select(['DATE_FORMAT(FROM_UNIXTIME(reporting_time),  "%b-%Y") AS MONTH', 
            'COUNT(1) AS FAIL', '(SUM(  `repaired_time` ) - SUM(  `reporting_time` )) AS REPAIR' ])
        ->where(['SUBSTRING(`asset_code`,9,2)' => '17',])
        ->andWhere(['resp_contractor' => '1', 'classify_BD' => '1'])
        ->andWhere(['not', ['repaired_time' => null]])
        ->groupBy(['DATE_FORMAT( FROM_UNIXTIME( reporting_time ) ,  "%b-%Y")'])
        ->orderBy(['reporting_time' => SORT_ASC])
        ->all();

        $mergeResult = $this->mergeRecords($lfailure, $efailure);

        return $this->render('monthly-reading', [
                // 'lfailure' => $lfailure,
                // 'efailure' => $efailure,
                'mergeResult' => $mergeResult,
                 ]);
    }


    /**
    * Station wise faults are queried and grouped by month
    */
    public function actionStationFault()
    {
        $model = new Breakdown();

        $itemCorridors = ArrayHelper::map(Corridor::find()->all(), 'corr_id', 'corr_name');
        $itemStationCodes = ArrayHelper::map(StationCode::find()->orderBy('stn_id DESC')->all(), 'stn_id', 'station_name');

        $this->view->params['itemCorridors'] = $itemCorridors;
        $this->view->params['itemStationCodes'] = $itemStationCodes;

        $stationSelected = '';
        $lfailure = '';
        $efailure = '';
        $period = '';
        $startDate = '';
        $endDate = '';

        /*// set the year array
        $currentYear = (int)date('Y');
        $yearArray = range(2016, $currentYear);

        // set the month array
        $formattedMonthArray = array(
                    "01" => "January", "02" => "February", "03" => "March", "04" => "April",
                    "05" => "May", "06" => "June", "07" => "July", "08" => "August",
                    "09" => "September", "10" => "October", "11" => "November", "12" => "December",
                );*/
        
        if ( $model->load(Yii::$app->request->post())) {
        
            
            $stn_id = '00'.$model['stn_id'];
            $corr_id = '0'.$model['corr_id'];
            
            // User wants to set the year
            $period = $model['period'];
            $startDate = strtotime($model['start_date']);
            $endDate = strtotime($model['end_date']);

            $stationSelected = (string) StationCode::findOne($stn_id)['station_name'];

            if ($startDate >= $endDate ) {

                $lfailure = Breakdown::find()
                ->select(['DATE_FORMAT(FROM_UNIXTIME(reporting_time),  "%b-%Y") AS MONTH', 'COUNT(1) AS FAIL' ])
                ->where(['SUBSTRING(`asset_code`,9,2)' => '18', 'SUBSTRING(`asset_code`,3,4)' => $stn_id, ])
                ->andWhere(['resp_contractor' => '1', 'classify_BD' => '1'])
                ->groupBy(['DATE_FORMAT( FROM_UNIXTIME( reporting_time ) ,  "%b-%Y")'])
                ->orderBy(['reporting_time' => SORT_ASC])
                ->all();

                $efailure = Breakdown::find()
                ->select(['DATE_FORMAT(FROM_UNIXTIME(reporting_time),  "%b-%Y") AS MONTH', 'COUNT(1) AS FAIL' ])
                ->where(['SUBSTRING(`asset_code`,9,2)' => '17', 'SUBSTRING(`asset_code`,3,4)' => $stn_id, ])
                ->andWhere(['resp_contractor' => '1', 'classify_BD' => '1'])
                ->groupBy(['DATE_FORMAT( FROM_UNIXTIME( reporting_time ) ,  "%b-%Y")'])
                ->orderBy(['reporting_time' => SORT_ASC])
                ->all();
            } else {
                $lfailure = Breakdown::find()
                ->select(['DATE_FORMAT(FROM_UNIXTIME(reporting_time),  "%b-%Y") AS MONTH', 'COUNT(1) AS FAIL' ])
                ->where(['SUBSTRING(`asset_code`,9,2)' => '18', 'SUBSTRING(`asset_code`,3,4)' => $stn_id, ])
                ->andWhere(['resp_contractor' => '1', 'classify_BD' => '1'])
                ->andWhere(['between', 'reporting_time', $startDate, $endDate])
                ->groupBy(['DATE_FORMAT( FROM_UNIXTIME( reporting_time ) ,  "%b-%Y")'])
                ->orderBy(['reporting_time' => SORT_ASC])
                ->all();

                $efailure = Breakdown::find()
                ->select(['DATE_FORMAT(FROM_UNIXTIME(reporting_time),  "%b-%Y") AS MONTH', 'COUNT(1) AS FAIL' ])
                ->where(['SUBSTRING(`asset_code`,9,2)' => '18', 'SUBSTRING(`asset_code`,3,4)' => $stn_id, ])
                ->andWhere(['resp_contractor' => '1', 'classify_BD' => '1'])
                ->andWhere(['between', 'reporting_time', $startDate, $endDate])
                ->groupBy(['DATE_FORMAT( FROM_UNIXTIME( reporting_time ) ,  "%b-%Y")'])
                ->orderBy(['reporting_time' => SORT_ASC])
                ->all();
                
            }
        }


        return $this->render('station-fault', [
                    'model'=> $model, 
                    'itemCorridors'=> $itemCorridors, 
                    'itemStationCodes'=> $itemStationCodes,
                    /*'formattedMonthArray'=> $formattedMonthArray, 
                    'yearArray'=> $yearArray, */
                    'stationSelected'=> $stationSelected,
                    'period'=> $period,
                    'startDate'=> $startDate,
                    'endDate'=> $endDate,
                    'lfailure'=> $lfailure,
                    'efailure'=> $efailure,
                ]);
    }

/**
    * Equipment wise faults are queried 
    */
    public function actionEquipmentFault()
    {
        $model = new Breakdown();

        $itemCorridors = ArrayHelper::map(Corridor::find()->all(), 'corr_id', 'corr_name');
        $itemStationCodes = ArrayHelper::map(StationCode::find()->orderBy('stn_id DESC')->all(), 'stn_id', 'station_name');
        //$itemEquipmentNames = ArrayHelper::map(EquipmentName::find()->orderBy('ename_name')->all(), 'ename_id', 'ename_name');
        $itemEquipmentNames = array(
            '17' => 'Escalator',
            '18' => 'Lift',
            );
        $itemLevels = ArrayHelper::map(Level::find()->all(), 'level_id', 'level_name');

        $this->view->params['itemCorridors'] = $itemCorridors;
        $this->view->params['itemStationCodes'] = $itemStationCodes;
        $this->view->params['itemEquipmentNames'] = $itemEquipmentNames;
        $this->view->params['itemLevels'] = $itemLevels;

        $stationSelected = '';
        $corridorSelected = '';
        $equipmentSelected = '';
        $levelSelected = '';
        $failure = '';
        $enos_id = '';

        if ($model->load(Yii::$app->request->post()) && $model['stn_id'] != '') {
        
            $stn_id = $model['stn_id'];
            $corr_id = $model['corr_id'];
            $ename_id = $model['ename_id'];
            $enos_id = $model['enos_id'];
            $level_id = $model['level_id'];

            $asset_code = str_pad($corr_id,2,'0',STR_PAD_LEFT) . str_pad($stn_id,4,'0',STR_PAD_LEFT). str_pad($ename_id,4,'0',STR_PAD_LEFT) . str_pad($enos_id,4,'0',STR_PAD_LEFT) . str_pad($level_id,2,'0',STR_PAD_LEFT);

            $stationSelected = (string) StationCode::findOne($stn_id)['station_name'];
            $equipmentSelected = (string) EquipmentName::findOne($ename_id)['ename_name'];
            $levelSelected = (string) Level::findOne($level_id)['level_name'];

            $failure = Breakdown::find()
            ->select(['asset_code', 'DATE_FORMAT(FROM_UNIXTIME(reporting_time),  "%d-%b-%Y") AS DATE', 
                'bd_description', 'repair_description' ])
            ->where(['asset_code' => $asset_code, 'resp_contractor' => '1'])
            ->orderBy(['reporting_time' => SORT_ASC])
            ->all();
        }

        return $this->render('equipment-fault', [
                    'model'=> $model, 
                    'itemCorridors'=> $itemCorridors, 
                    'itemStationCodes'=> $itemStationCodes,
                    'itemEquipmentNames'=>$itemEquipmentNames, 
                    'itemLevels'=>$itemLevels,
                    'stationSelected'=> $stationSelected,
                    'equipmentSelected'=> $equipmentSelected,
                    'levelSelected'=> $levelSelected,
                    'enos_id'=> $enos_id,
                    'failure'=> $failure,
                ]);
    }

    /**
    * Here two record sets are merged into an Array.
    * Both recordsets are equal in number of rows. 
    * There are 2 colums. First column is month, the second coloumn is count. 
    * The 2 counts from the 2 record set are added to five the total in 4th coloumn.
    */
    public function mergeRecords($record1, $record2)
    {
        $arrayResult  = array();
        $i = 0;

        foreach($record1 as $record) {
            //array_push($array1, array($record['MONTH'], $record['FAIL']));
            $arrayResult[$i][0] = $record['MONTH'];
            $arrayResult[$i][1] = $record['FAIL'];
            $arrayResult[$i][2] = $this->readableTime($record['REPAIR']);
            $arrayResult[$i][7] = $record['REPAIR']; // Store it for later usage
            $i++;
        }

        $i = 0;
        foreach($record2 as $record) {
            $arrayResult[$i][3] = $record['FAIL'];
            $arrayResult[$i][4] = $this->readableTime($record['REPAIR']);
            $arrayResult[$i][5] = $arrayResult[$i][1] + $arrayResult[$i][3];
            $arrayResult[$i][6] = $this->readableTime(($arrayResult[$i][7] + $record['REPAIR']));
            $i++;
       }

        return $arrayResult;
    }

    /*
    * Converts seconds to hours minutes and seconds
    */
    public function readableTime($sec)
    {
        $hr = (int) ($sec / 3600);
        $min = (int) (($sec - (3600 * $hr)) / 60);
        $sec = $sec - (3600 * $hr) - ($min * 60);

        return $hr . ':' . $min . ':' . $sec . '';
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
}


/*
SELECT `asset_code` 
FROM `breakdown` 
WHERE  SUBSTRING(`asset_code`,1,6)= '020026'

SELECT DATE_FORMAT( FROM_UNIXTIME( reporting_time ) ,  '%b-%Y' ) AS 
MONTH , COUNT( 1 ) AS FAIL
FROM breakdown
WHERE  SUBSTRING(`asset_code`,9,2)= '18'
AND  `resp_contractor` =1
GROUP BY DATE_FORMAT( FROM_UNIXTIME( reporting_time ) ,  '%b-%Y' ) 
ORDER BY reporting_time ASC;

SELECT DATE_FORMAT(FROM_UNIXTIME(reporting_time),  "%b-%Y") AS MONTH, 
    COUNT(1) AS FAIL 
FROM `breakdown` 
WHERE ((SUBSTRING(`asset_code`,9,2)='18') AND (SUBSTRING(`asset_code`,3,4)='0014')) 
    AND ((`resp_contractor`='1') AND (`classify_BD`='1')) 
GROUP BY DATE_FORMAT( FROM_UNIXTIME( reporting_time ) ,  "%b-%Y") 
ORDER BY `reporting_time`


SELECT DATE_FORMAT(FROM_UNIXTIME(reporting_time),  "%b-%Y") AS MONTH, 
    COUNT(1) AS FAIL 
FROM `breakdown` 
WHERE (((SUBSTRING(`asset_code`,9,2)='18') AND (SUBSTRING(`asset_code`,3,4)='0014')) 
    AND ((`resp_contractor`='1') 
    AND (`classify_BD`='1'))) AND (`reporting_time` BETWEEN 1478736000 AND 1487980800) 
GROUP BY DATE_FORMAT( FROM_UNIXTIME( reporting_time ) ,  "%b-%Y") 
ORDER BY `reporting_time`

SELECT DATE_FORMAT(FROM_UNIXTIME(reporting_time), "%b-%Y") AS MONTH, 
    COUNT(1) AS FAIL, 
    (SUM( `repaired_time` ) - SUM( `reporting_time` )) AS REPAIR 
FROM `breakdown` 
WHERE ((SUBSTRING(`asset_code`,9,2)='18') 
    AND ((`resp_contractor`='1') AND (`classify_BD`='1') 
    AND (`repaired_time` IS NOT NULL)))  
GROUP BY DATE_FORMAT( FROM_UNIXTIME( reporting_time ) , "%b-%Y") 
ORDER BY `reporting_time`

*/