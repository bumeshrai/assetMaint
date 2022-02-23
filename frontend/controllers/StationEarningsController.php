<?php

namespace frontend\controllers;

use Yii;
use common\models\StationEarning;
use common\models\StationCode;
use common\models\StationEarningSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * StationEarningsController implements the CRUD actions for StationEarning model.
 */
class StationEarningsController extends Controller
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
     * Lists all StationEarning models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StationEarningSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StationEarning model.
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
     * Creates a new StationEarning model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StationEarning();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->earning_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing StationEarning model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->earning_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing StationEarning model.
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
     * Finds the StationEarning model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StationEarning the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StationEarning::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /*
     * Daily readings of the choosen month.
    */
    public function actionDaily()
    {
        $model = new StationEarning();

        // set the year array
        $currentYear = (int)date('Y');
        $yearArray = range(2017, $currentYear);

        // set the month array
        $formattedMonthArray = array(
                    "01" => "January", "02" => "February", "03" => "March", "04" => "April",
                    "05" => "May", "06" => "June", "07" => "July", "08" => "August",
                    "09" => "September", "10" => "October", "11" => "November", "12" => "December",
                );

        $monthSelected = $yearSelected  = '';
        $stationIdChecked = $earning = $searning = $dayMonth = $temp = array();
        $daily = true;

        // Get all Stations between SNP and STM in corridor 2 & betweem SLM and SAP in corridor 1
        /*
        * Remove the below code for station selection.
        * Revive it if needed later
        */
        // $itemStations = ArrayHelper::map(StationCode::find()
        //     ->where(['and', 'stn_id >= 12', 'stn_id <= 32'])
        //     ->andWhere(['<>', 'stn_id', '18']) // Remove Egmore
        //     ->all(), 
        //     'stn_id', 'station_name');

        if (Yii::$app->request->post()) {
            $monthSelected = Yii::$app->request->post()['month'];
            $yearSelected = Yii::$app->request->post()['year'];

            /*
            * Remove the below code for station selection.
            * Revive it if needed later
            */
            // $stationIdChecked = Yii::$app->request->post()['StationEarning'];
            // $stationIdChecked = $stationIdChecked['stn_id'];
            
            // All stations selected
            $stationIdChecked = array(12,13,14,15,16,17,26,27,28,29,30,31,32, 19,20,21,22,23,24,25);
            
            $searning = $this->stationCheckedEarnings($stationIdChecked, 
                                                $monthSelected, $yearSelected,$daily);
            
            $earning = $this->totalEarnings($monthSelected, $yearSelected,$daily);

            $dayMonth = $this->dateArray($monthSelected, $yearSelected,$daily);

            // Add the column of days to station earnings
            $searning = $this->mergeArrayColumns($dayMonth, $searning);
        }

        return $this->render('daily', [
            'model' => $model,
            'formattedMonthArray' => $formattedMonthArray,
            'yearArray' => $yearArray,
            'monthSelected' => $monthSelected,
            'yearSelected' => $yearSelected,
            //'itemStations' => $itemStations,
            'earning' => $earning,
            'searning' => $searning,
            ]);
    }

    public function actionMonth()
    {
        $model = new StationEarning();

        /*
        * Fill an array with station code for all stations
        */
        $stationIdChecked = array(12,13,14,15,16,17,26,27,28,29,30,31,32, 19,20,21,22,23,24,25);
        $daily = false; //Individual stations not needed.
        $monthSelected = $yearSelected  = '';
        
        $searning = $stations = array();
        $iter = 1;  

        $searning = $this->stationCheckedEarnings($stationIdChecked, 
                                                $monthSelected, $yearSelected,$daily);

        $recordSet = StationEarning::find()
            ->select([ 'MONTH(  `date_on` ) AS MONTH' , 
                'SUM( `cash` +  `card` +  `voucher` +  `web` +  `non_fare`) AS EARNINGS'  ])
            ->where(['YEAR(  `date_on` )' => 2017  ])
            ->groupBy('MONTH(  `date_on` )')
            ->orderBy(['date_on' => SORT_ASC])
            ->asArray()
            ->all();

        $earning = array(array('Month', 'Total '),);
        while ($record = current($recordSet)) {
            $addArray = array($record['MONTH'], $record['EARNINGS']/1, );
            array_push($earning, $addArray);
            next($recordSet);
        }
        reset($recordSet);

        $month = array(array('Month'),);
        while ($record = current($recordSet)) {
            $addArray = array($record['MONTH'], );
            array_push($month, $addArray);
            next($recordSet);
        }
        reset($recordSet);

        // Add the arrays of station earnings to total earnings
            $searning = $this->mergeArrayColumns($month, $searning);

        return $this->render('month', [
            'model' => $model,
            'earning' => $earning,
            'searning' => $searning,
            ]);
    }

    /*
    * This function will return the earnings of all the checked station for the requested month and year
    * The return array will have single coloumn for each station with header as station name
    * & other numbers as the station earning ordered daily
    */
    private function stationCheckedEarnings($stationIdChecked, $monthSelected, $yearSelected,$daily)
    {
        $searning = $stations = array();
        $iter = 1;  

        foreach ($stationIdChecked as $value) { // Loop for all selected stations

            $stationName = '';
            // Get from all the selected station codes the station names
            $stationRecord = StationCode::find()->where(['stn_id' => $value])->asArray()->all();
            while($record = current($stationRecord)){
                $stationName = $record['station_name'];
                array_push($stations, $stationName); // stores the station name in the array
                next($stationRecord);
            }
            // Fetch the earnings for the selected station
            if ($daily) {
                $recordSet = StationEarning::find()
                    ->select([ 'DAY(  `date_on` ) AS DAY' , 
                       '( `cash` +  `card` +  `voucher` +  `web` +  `non_fare`) AS EARNINGS'  ])
                    ->where(['stn_id' => $value])
                    ->andWhere(['MONTH(  `date_on` )' => $monthSelected ])
                    ->andWhere(['YEAR(  `date_on` )' => $yearSelected ])
                    ->orderBy(['date_on' => SORT_ASC])
                    ->asArray()
                    ->all();
                } else {
                    $recordSet = StationEarning::find()
                        ->select([ 'MONTH(  `date_on` ) AS MONTH' , 
                           'SUM( `cash` +  `card` +  `voucher` +  `web` +  `non_fare`) AS EARNINGS'  ])
                        ->where(['stn_id' => $value])
                        ->andWhere(['YEAR(  `date_on` )' => 2017  ])
                        ->groupBy('MONTH(  `date_on` )')
                        ->orderBy(['date_on' => SORT_ASC])
                        ->asArray()
                        ->all();
                }
            
            // Store the retreived station earnings in temporary variable
            if (count($recordSet) > 0) { // Ignore if no records. Shows that stations were not opened
                if (($value > 18 && $value < 26) && (!$daily))
                    $temp = array(array($stationName), array(0), array(0), array(0), array(0));
                 else
                    $temp = array(array($stationName,),);
                while ($record = current($recordSet)) {
                    $addArray = array($record['EARNINGS']+0, );
                    array_push($temp, $addArray);
                    next($recordSet);
                }
                reset($recordSet);

                if($iter > 1) { // This is not the first iteration, therefore previous array for earning exits
                    // Add the column of the next station earnings
                    $searning = $this->mergeArrayColumns($searning, $temp);
                    $iter++;
                } else { // This the first iteration. Initialise station earning array
                        $iter++;
                        $searning = $temp;
                }   
            }
        }

        return $searning;
    }

    /*
    * This function will return the total daily earningsfor the requested month and year
    * The return array will have two coloumns. The first column will give the days of the month.
    * The second column will give the total earnings
    */
    private function totalEarnings($monthSelected, $yearSelected,$daily)
    {
        // Fetch the total earnings for the month
            $recordSet = StationEarning::find()
                ->select([ 'DAY(  `date_on` ) AS DAY' , 
                    'SUM( `cash` +  `card` +  `voucher` +  `web` +  `non_fare`) AS EARNINGS'  ])
                ->where(['MONTH(  `date_on` )' => $monthSelected ])
                ->andWhere(['YEAR(  `date_on` )' => $yearSelected ])
                ->groupBy('DAY(  `date_on` )')
                ->orderBy(['date_on' => SORT_ASC])
                ->asArray()
                ->all();

            $earning = array(array('Day', 'Total '),);
            while ($record = current($recordSet)) {
                $addArray = array($record['DAY'], $record['EARNINGS']/1, );
                array_push($earning, $addArray);
                next($recordSet);
            }
            reset($recordSet);

            return $earning;
    }

    private function dateArray($monthSelected, $yearSelected,$daily)
    {
        // Fetch the total earnings for the month
            $recordSet = StationEarning::find()
                ->select([ 'DAY(  `date_on` ) AS DAY' , 
                    'SUM( `cash` +  `card` +  `voucher` +  `web` +  `non_fare`) AS EARNINGS'  ])
                ->where(['MONTH(  `date_on` )' => $monthSelected ])
                ->andWhere(['YEAR(  `date_on` )' => $yearSelected ])
                ->groupBy('DAY(  `date_on` )')
                ->orderBy(['date_on' => SORT_ASC])
                ->asArray()
                ->all();

            $dayMonth = array(array('Day',),);
            while ($record = current($recordSet)) {
                $addArray = array($record['DAY'],  );
                array_push($dayMonth, $addArray);
                next($recordSet);
            }
            reset($recordSet);

            return $dayMonth;
    }


    /*
    * Merge the columns of second array to the first.
    * The two arrays should have same number of rows.
    */
    private function mergeArrayColumns($array1, $array2)
    {
        $temp = array(); // Initialise a temporary array to hold merged values.
        
        for ($i = 0; $i < count($array1); $i++) {
                $addArray = array_merge($array1[$i],$array2[$i]);
                array_push($temp,$addArray);
        }
        
        return $temp;
    }
}

/*
SELECT DAY(  `date_on` ) AS 
DAY , (
 `cash` +  `card` +  `voucher` +  `web` +  `non_fare`
) AS Earnings
FROM  `station_earning` 
WHERE  `stn_id` =12
AND MONTH(  `date_on` ) =6

SELECT MONTH(  `date_on` ) AS MONTH, 
SUM( `cash` +  `card` +  `voucher` +  `web` +  `non_fare`) AS EARNINGS 
FROM `station_earning` 
WHERE (YEAR(  `date_on` )='2017') 
GROUP BY MONTH(  `date_on` ) 
ORDER BY `date_on`
*/
