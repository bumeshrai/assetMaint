<?php

/* This program will supply the components that make up the asset code. This could be uaed by
* android program to make dropdown boxes for generating the asset code.
Could be useful for reporting a breakdown
* Dr. B. Umesh Rai
*/

namespace api\controllers;

use yii\rest\ActiveController;
use common\models\Corridor;

class AssetCodeComponentController extends ActiveController
{
  public $modelClass = 'common\models\Corridor';

  public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

  public function actionIndex($comp)
    {
        $model = new \common\models\Corridor();
        $response = array();
        $response["success"] = false;  
        $response["message"] = "Failed to retrieve record"; 

        If($comp == "csel") {
            $response["success"] = true;
            $response["message"] = "success"; 
        }

        if ($response["success"]) {

            // Get Corridors
            $corridor = \common\models\Corridor::find()->all();
            $record = array();
            foreach($corridor as $record) {
                $response['corridor'][$record['corr_id']] = $record['corr_name'];
            }

            // Get Station Codes
            $stationCode = \common\models\StationCode::find()->all();
            $record = array();
            foreach($stationCode as $record) {
                $response['stationCode'][$record['stn_id']] = $record['station_name'];
            }
        
            // Get Equipment Name
            $equipmentName = \common\models\EquipmentName::find()->all();
            $record = array();
            foreach($equipmentName as $record) {
                $response['equipmentName'][$record['ename_id']] = $record['ename_name'];
            }

            // Get Location
            $location = \common\models\Level::find()->all();
            $record = array();
            foreach($location as $record) {
                $response['location'][$record['level_id']] = $record['level_name'];
            }
        }
        
        

        return ($response); 
    }
}
