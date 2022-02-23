<?php

namespace frontend\controllers;

use Yii;
use common\models\PowerReading;
use common\models\PowerReadingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PowerReadingsController implements the CRUD actions for PowerReading model.
 */
class PowerReadingsController extends Controller
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
     * Lists all PowerReading models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PowerReadingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PowerReading model.
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
     * Creates a new PowerReading model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PowerReading();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->reading_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PowerReading model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->reading_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PowerReading model.
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
     * Finds the PowerReading model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PowerReading the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PowerReading::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /*
     * Monthly consumption of real and apparant powers are summed from the daily values for different RSS
    */
    public function actionMonthlyReading()
    {
        $model = new PowerReading();

        //ARSS consumption
        $aconsumption = PowerReading::find()
        ->select(['DATE_FORMAT(date_on,  "%m-%Y") AS MONTH', 'SUM(active_power)AS KWH', 'SUM( total_power ) AS KVAH' ])
        ->where(['receiving_station' => 'ARSS'])
        ->orderBy(['date_on' => SORT_ASC])
        ->groupBy(['DATE_FORMAT( date_on,  "%m-%Y" )'])
       ->all();

        //KRSS consumption
        $kconsumption = PowerReading::find()
        ->select(['DATE_FORMAT(date_on,  "%m-%Y") AS MONTH', 'SUM(active_power)AS KWH', 'SUM( total_power ) AS KVAH' ])
        ->where(['receiving_station' => 'KRSS'])
        ->orderBy(['date_on' => SORT_ASC])
        ->groupBy(['DATE_FORMAT( date_on,  "%m-%Y" )'])
       ->all();

        //Solar Generation
        $sgeneration = PowerReading::find()
        ->select(['DATE_FORMAT(date_on,  "%m-%Y") AS MONTH', 'SUM(solar_generation)AS KWH' ])
        ->where(['receiving_station' => 'SOLAR'])
        ->orderBy(['date_on' => SORT_ASC])
        ->groupBy(['DATE_FORMAT( date_on,  "%m-%Y" )'])
       ->all();

        //Total consumption including Solar
        $tconsumption = PowerReading::find()
        ->select(['DATE_FORMAT(date_on,  "%m-%Y") AS MONTH', '(SUM(active_power) + SUM(solar_generation)) AS KWH', 'SUM( total_power ) AS KVAH' ])
        ->orderBy(['date_on' => SORT_ASC])
        ->groupBy(['DATE_FORMAT( date_on,  "%m-%Y" )'])
       ->all();


        return $this->render('monthly-reading', [
                'aconsumption' => $aconsumption,
                'kconsumption' => $kconsumption,
                'tconsumption' => $tconsumption,
                'sgeneration' => $sgeneration,
                ]);
    }

    /*
     * Monthly consumption of real and apparant powers are summed from the daily values for different RSS
     * and shown on google graphs. The data in required format in an araay is collated here and passed on. 
    */
    public function actionMonthlyGraph()
    {
        $model = new PowerReading();

        $graphSelected = $arss = $arsspf = $krss  = $krsspf = $powerFactor = $bill
            = $aBill = $kBill = $totalBill = $sgen = $sBill = '';
        

        if (Yii::$app->request->post()) {
            $graphSelected = Yii::$app->request->post()['graphSelected'];

            // Get the 3 arrays for graph
            $arss = $this->readingAllMonths('ARSS', 'wattage'); // get active power
            $arsspf = $this->readingAllMonths('ARSS', 'powerFactor'); // get reactive power
            $aBill = $this->readingAllMonths('ARSS', 'monthlyBill'); // get billing for power
            
            $krss = $this->readingAllMonths('KRSS', 'wattage'); // get active power
            $krsspf = $this->readingAllMonths('KRSS', 'powerFactor'); // get active power
            $kBill = $this->readingAllMonths('KRSS', 'monthlyBill'); // get active power

            $sgen = $this->readingAllMonths('SOLAR', 'wattage'); // get solar generation
            $sBill = $this->readingAllMonths('SOLAR', 'monthlyBill'); // get billing for power

            // Merge the 2 coloumns arrays into a 3 coloumns array
            // the first coloumn is common as the sql had order by.
            $powerFactor = array(array('Month', 'Alandur PF', 'Koyembeddu PF'),);
            $monthCount = 0;
            foreach ($arsspf as $key => $month) {
                if ($monthCount != 0) { // ignore the top of array
                    // add ponth from arsspf array and pf values from the respective arrays.
                    $addArray = array($arsspf[$monthCount][0], $arsspf[$monthCount][1], $krsspf[$monthCount][1]);
                    array_push($powerFactor, $addArray);
                }
                
                $monthCount++;
           }

            $totalBill = array(array('Month', 'Monthly Electricity Bill', 'Monthly Penalty'),);
            $monthCount = 0;
            foreach ($aBill as $key => $month) {
                if ($monthCount != 0) { // ignore the top of array
                    if ($monthCount < 9) {
                        $addArray = array($aBill[$monthCount][0], 
                                $aBill[$monthCount][1]+$kBill[$monthCount][1], 
                                $aBill[$monthCount][2]+$kBill[$monthCount][2]);
                    } else {
                        // Solar array starts only from month of 12/16 i.e 9 months later than 
                        // other readings, hence ignore earlier values
                        // and decrement the array pointer by 9 months.
                        $addArray = array($aBill[$monthCount][0], 
                                $aBill[$monthCount][1]+$kBill[$monthCount][1]+$sBill[$monthCount-9][1], 
                                $aBill[$monthCount][2]+$kBill[$monthCount][2]);
                    }
                    array_push($totalBill, $addArray);
                }
                
                $monthCount++;
           }

        }

        return $this->render('monthly-graph', [
            'model' => $model,
            'graphSelected' => $graphSelected,
            'arss' => $arss,
            'arsspf' => $arsspf,
            'krss' => $krss,
            'krsspf' => $krsspf,
            'sgen' => $sgen,
            'powerFactor' => $powerFactor,
            'totalBill' => $totalBill,
            'aBill' => $aBill,
            'sBill' => $sBill,
            ]);
     }

    /*
     * Daily readings of the choosen month.
    */
    public function actionMonthDailyReading()
    {
        $model = new PowerReading();

        // set the year array
        $currentYear = (int)date('Y');
        $yearArray = range(2016, $currentYear);

        // set the month array
        $formattedMonthArray = array(
                    "01" => "January", "02" => "February", "03" => "March", "04" => "April",
                    "05" => "May", "06" => "June", "07" => "July", "08" => "August",
                    "09" => "September", "10" => "October", "11" => "November", "12" => "December",
                );

        $monthSelected = $yearSelected = $aReadings = $kReadings = $sReadings = '';
        $arss = $krss = $solar = $total = '';
        $aSumComs = $kSumComs = $sSumGens = $aValues = $kValues = '';
 
        if (Yii::$app->request->post()) {
            $monthSelected = Yii::$app->request->post()['month'];
            $yearSelected = Yii::$app->request->post()['year'];

            $aReadings = $this->reading('ARSS', $monthSelected, $yearSelected);
            $kReadings = $this->reading('KRSS', $monthSelected, $yearSelected);
            $sReadings = $this->reading('SOLAR', $monthSelected, $yearSelected);

            // Extract the ARSS readings into an array
            $arss = array();
            
            reset($aReadings);
            while ($record = current($aReadings)) {
                $addArray = array(date( 'd', strtotime($record['date_on'])), 
                    $record['active_power']+0, $record['total_power']+0);
                array_push($arss, $addArray);
                next($aReadings);
            }

            // Extract the KRSS readings into an array
            $krss = array();
            
            reset($kReadings);
            while ($record = current($kReadings)) {
                $addArray = array(date( 'd', strtotime($record['date_on'])), 
                    $record['active_power']+0, $record['total_power']+0);
                array_push($krss, $addArray);
                next($kReadings);
            }
            
            // Extract the KRSS readings into an array
            $solar = array();
            
            reset($sReadings);
            while ($record = current($sReadings)) {
                $addArray = array(date( 'd', strtotime($record['date_on'])), 
                    $record['solar_generation']+0, );
                array_push($solar, $addArray);
                next($sReadings);
            }

            $aSumComs = $this->readingTotal('ARSS', $monthSelected, $yearSelected);
            $kSumComs = $this->readingTotal('KRSS', $monthSelected, $yearSelected);
            $sSumGens = $this->readingTotal('SOLAR', $monthSelected, $yearSelected);

            $aValues = $this->calculateVar('ARSS',$aSumComs);
            $kValues = $this->calculateVar('KRSS',$kSumComs);

            // Collate the KWH readings for graph
            $total = $this->addEnergy($arss, $krss, $solar);
        }
           
        return $this->render('month-daily-reading', [
            'model' => $model,
            'formattedMonthArray' => $formattedMonthArray,
            'yearArray' => $yearArray,
            'monthSelected' => $monthSelected,
            'yearSelected' => $yearSelected,
            'arss' => $arss,
            'krss' => $krss,
            'solar' => $solar,
            'total' => $total,
            //'aReadings' => $aReadings,
            'kReadings' => $kReadings,
            'sReadings' => $sReadings,
            //'aSumComs' => $aSumComs,
            //'kSumComs' => $kSumComs,
            'sSumGens' => $sSumGens,
            'aValues' => $aValues,
            'kValues' => $kValues,
            ]);
    }

    /*
    * Returns the daily reading for the month for a substation
    */
    private function reading($rss, $monthSelected, $yearSelected)
    {
        if ($rss != 'SOLAR') {
            $meter = PowerReading::find()
                        ->select(['date_on','active_power','total_power'])
                        ->where(['MONTH(date_on)' => $monthSelected, 'YEAR(date_on)' => $yearSelected, 
                            'receiving_station' => $rss])
                        ->orderBy(['date_on' => SORT_ASC])
                        ->all();
        } else {
            $meter = PowerReading::find()
                        ->select(['date_on','solar_generation'])
                        ->where(['MONTH(date_on)' => $monthSelected, 'YEAR(date_on)' => $yearSelected, 
                            'receiving_station' => $rss])
                        ->orderBy(['date_on' => SORT_ASC])
                        ->all();
        }

        return $meter;
    }
    
    /*
    * Returns the monthly reading for the month for a substation
    */
    private function readingTotal($rss, $monthSelected, $yearSelected)
    {
        if ($rss != 'SOLAR') {
            $meter = PowerReading::find()
                        ->select(['SUM(active_power) AS KWH', 'SUM( total_power ) AS KVAH', 'MAX(maximum_demand) AS MD' ])
                        ->where(['MONTH(date_on)' => $monthSelected, 'YEAR(date_on)' => $yearSelected, 'receiving_station' => $rss])
                        ->all();
        } else {
            $meter = PowerReading::find()
                        ->select(['SUM(solar_generation) AS KWH', ])
                        ->where(['MONTH(date_on)' => $monthSelected, 'YEAR(date_on)' => $yearSelected, 'receiving_station' => $rss])
                        ->all();
        }
    
        return $meter;
    }

    /*
    * Returns the all months readings to draw a graph
    */
    private function readingAllMonths($rss, $what)
    {
        /* 
        * SQL for getting the Monthly KWH, KVAH and MD readings or a RSS.
        * KWH is the addition of RSS and Solar power
        */
        $meter = PowerReading::find()
                ->select(['DATE_FORMAT(date_on,  "%m-%Y") AS MONTH', 
                    '(SUM(active_power) + SUM(solar_generation)) AS KWH', 'SUM( total_power ) AS KVAH', 
                    'MAX(maximum_demand) AS MD'  ])
                ->where(['receiving_station' => $rss])
                ->orderBy(['date_on' => SORT_ASC])
                ->groupBy(['DATE_FORMAT( date_on,  "%m-%Y" )'])
                ->asArray()
                ->all();

        // Pick only the Month, KWH and KVAH readings
        if ($what == 'wattage') {
            $readings = array(array('Month', 'KWH', 'KVAH'),);
            while ($record = current($meter)) {
                $addArray = array($record['MONTH'], $record['KWH']+0, $record['KVAH']+0);
                array_push($readings, $addArray);
                next($meter);
            }
            reset($meter);
        }

        // Pick only the Month and PF readings
        if ($what == 'powerFactor') {
            $readings = array(array('Month', 'PF'),);
            while ($record = current($meter)) {
                if ($record['KVAH'] != '0') { 
                    $powerFactor = ($record['KWH']+0)/($record['KVAH']+0);
                } else {
                    $powerFactor = 1;
                }
                $addArray = array($record['MONTH'], $powerFactor);
                array_push($readings, $addArray);
                next($meter);
            }
            reset($meter);
        }
        
        // Calculate the Monthly billing and PF with the current rate       
        if ($what == 'monthlyBill') {

            // Initialise the array X-axis marker and Data Legends
            $readings = array(array('Month', 'Monthly Electricity Bill', 'Monthly Penalty'),);
            
            while ($record = current($meter)) {
                $kwh =  $record['KWH']+0; //convert to int
                $kvah =  $record['KVAH']+0; //convert to int
                $md =  $record['MD']+0; //convert to int
                
                $pf = $this->calculatePf($kwh, $kvah); // calculate the PF with given kwh and kvah
                
                if ($rss == 'KRSS') {
                    $bill = $this->monthlyBill($kwh, 5000); // maxm demand at KRSS is 5000
                } elseif ($rss == 'ARSS') {
                    $bill = $this->monthlyBill($kwh, 4500); // maxm demand at KRSS is 4500
                } else {
                     $bill = $this->monthlyBill($kwh, 0); // Solar generation
                }
                
                if ($rss == 'SOLAR') { // calculate the penalty
                    $penalty = $this->pfPenalty($kwh, 0, 1);  // MD = 0 & PF = 1
                } else {
                    $penalty = $this->pfPenalty($kwh, $md, $pf);
                }

                $addArray = array($record['MONTH'], $bill, $penalty);
                array_push($readings, $addArray);
                next($meter);
            }
            reset($meter);
        }

    return $readings;
    }

    /*
    * Calculate the values from the readings
    */
    private function calculateVar($rss, $passedRec)
    {
        reset($passedRec);
        while ($record = current($passedRec)) {
            $kwh =  $record['KWH']+0;
            $kvah =  $record['KVAH']+0;
            $md =  $record['MD']+0;
            
            $pf = $this->calculatePf($kwh, $kvah);

            
            if ($rss == 'KRSS') {
                $bill = $this->monthlyBill($kwh, 5000);
            } else {
                $bill = $this->monthlyBill($kwh, 4500);
            }
            
            $penalty = $this->pfPenalty($kwh, $md, $pf);

            $values = array ('KWH' => $kwh, 'KVAH' => $kvah, 
                'PF' => $pf, 
                'MD' => $md, 
                'BILL' => $bill,
                'PENALTY' => $penalty );
            next($passedRec);
        }

        return $values;
    }

    /*
    * Calculate the electricity bill by taking consumed units and contracted demand
    */
    private function monthlyBill($kwh, $md) {
        if ( $md > 0) {
            $bill = $kwh * 6.35 + $md * 300; // TNEB charge of HT 1B
        }
        else {
            $bill = $kwh * 5.6; // Solar charge for 1st year
        }

        return $bill;
    }

    /*
    * Calculate the penalty bill by taking consumed units and actual demand
    */
    private function pfPenalty($kwh, $md, $pf) {
        $factor = 0;
        if ( $pf < 0.9 )
            $factor = 1;
        if ( $pf < 0.85 )
            $factor = 1.5;
        if ( $pf < 0.75 )
            $factor = 2;
    
        $bill = number_format(($kwh * 6.3 + $md * 300) * (0.9 - $pf) * $factor, 0, '.', '');

        return $bill;
    }

    /*
    * Calculate the monthly power factor
    */
    private function calculatePf($kwh, $kvah) {
        $pf = 1;

        if ($kvah != '0') { 
            $pf = ($kwh)/($kvah);
        } 

        return $pf;
    }

    /*
    * Return an array of total energy consumed
    */
    private function addEnergy($array1, $array2, $array3){

        $totalArray = array(array('Day', 'ARSS', 'KRSS', 'Solar', 'Total'),);

        for ($i = 0; $i < sizeof($array1,0); $i++) {
            $element1 = $array1[$i][0]; //Day
            $element2 = $array1[$i][1]; // Alandur KWH
            $element3 = $array2[$i][1]; // Koyembedu KWH
            $element4 = $array3[$i][1]; // Solar KWH
            $element5 = $element2 + $element3 + $element4;

            array_push($totalArray, array($element1, $element2, $element3, $element4, $element5));
        }
        return $totalArray;
    }

}

/*
$consumption = OheProgress::find()->select(['ohe_id','section', 'tension_number'])->where(['work_completed' => 0])->all();

SELECT DATE_FORMAT( date_on,  "%m-%Y" ) AS MONTH, 
SUM( active_power ) AS KWH, 
SUM( total_power ) AS KVAH 
FROM `power_reading` 
WHERE `receiving_station`='ARSS' 
GROUP BY DATE_FORMAT( date_on,  "%m-%Y" ) 
*/

/*
SELECT  `date_on` ,  `active_power` ,  `total_power` ,  `receiving_station` 
FROM  `power_reading` 
WHERE  `date_on` 
BETWEEN  '2016-11-01'
AND  '2016-11-30'
ORDER BY  `receiving_station` 
*/

/*
SELECT  `active_power` ,  `total_power` 
FROM power_reading
WHERE MONTH(  `date_on` ) =11
AND YEAR(  `date_on` ) =2016
AND  `receiving_station` =  'ARSS'
ORDER BY  `date_on` 
*/

/*
SELECT `solar_generation` FROM `power_reading` WHERE (MONTH(date_on)='12') AND (YEAR(date_on)='2016') AND (`receiving_station`='SOLAR')
*/