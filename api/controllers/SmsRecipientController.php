<?php

/* This program will retrieve the SMS number specific to an equipment. These numbers will get 
* SMS's once the maintenance sheet is submitted. The returned response is multidimensional.
* The commented out return is if the response returns only the mobile nos as a single array.
* Dr. B. Umesh Rai
*/

namespace api\controllers;

use yii\rest\ActiveController;
use common\models\Lift;

class SmsRecipientController extends ActiveController
{
  public $modelClass = 'common\models\SmsRecipient';

  public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

  public function actionIndex($equip)
    {
        $model = new \common\models\EquipmentName();
        $response = array();
        $response["success"] = false;  
        $response["message"] = "Failed to retrieve record"; 
        If($equip != null) {
            $response["success"] = true;
            $response["message"] = "success"; 
        }

        $equipmentName = \common\models\EquipmentName::find()->where(['ename_name' => $equip])->one();
        $enameId = $equipmentName->ename_id;
        $smsRecipient = \common\models\SmsRecipient::find()->where(['ename_id' => $enameId])->all();
        $record = array();
        $i = 1;
        foreach($smsRecipient as $record) {
            $response["mobile".$i] = $record["mobile"];
            $i++;
        }
    
        //return ($response); 
        return ($smsRecipient); 
    }
}
