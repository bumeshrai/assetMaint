<?php
/* This code will be the called by the android program for breakdown maintenance. In the
* create method, the fault is reported with the equipment access code. The system time
* is also recorded. The android then sends SMS to all concerned.
* In the index method, the pending repairs are retrieved.
* In the update method the name of service engineer, the time of repair and the description
* of repair work is saved.
* Dr. B. Umesh Rai
*/


namespace api\controllers;

use yii\rest\ActiveController;
use common\models\Breakdown;
 use \common\models\User;

class BreakdownController extends ActiveController
{
    public $modelClass = 'common\models\Breakdown';

    
    public function actions()
      {
          $actions = parent::actions();
          unset($actions['index'], $actions['create'], $actions['update']);
          return $actions;
      }

      /*
      * Get all records for breakdown for the department and which has not been attended
      */
    public function actionIndex($dept)
      {
          return \common\models\Breakdown::find()->where(['dept_id' => $dept])->andWhere(['attended' => 0])->all(); 
      }

      /* Generate the breakdown alert and store it
      */
    public function actionCreate()
      {
          $model = new Breakdown(); 
          $response = array();
          $response["success"] = false;  // preload the response with default value
          

           if ($model->load(\Yii::$app->getRequest()->getBodyParams(), '')) {

              // Check if equipment is already under breakdown
              $asset_code = \common\models\Breakdown::find()->where(['and', ['asset_code' => $model['asset_code']], ['<', 'attended', 1]])->one();
              
              If($asset_code != null) { // Under breakdown
                
                $response["message"] = "Equipment already under breakdown";
              
              } else {

                // Check if the asset code exists
                $asset_code = \common\models\Equipment::find()->where(['asset_code' => $model['asset_code']])->one(); 

                If($asset_code != null) { // asset code exists validated
                    $model['reported_by'] = \common\models\User::find()->where(['id' => $model['reported_by']])->one()['username']; 
                    $model['reporting_time'] = time();
                    if ($model->save()) {
                      $response["success"] = true;
                      $response["message"] = "Record Saved";
                    } else {
                      $response["message"] = "Record not saved";
                    }
                  } else {
                    // Error in entered asset code
                    $response["message"] = "Check Access Code";
                  }
              }
              return $response;
           } 
      }

      public function actionUpdate()
      {

        //Capture the posted data for id
        $params = \Yii::$app->request->post();
        // get the record for the requested id
        $model = \common\models\Breakdown::find()->where(['bd_id' => $params['bd_id']])->one();
        
        $response = array();
        $response["success"] = false;  // preload the response with default value

        if ($model->load(\Yii::$app->getRequest()->getBodyParams(), '')) {
            $model['repaired_time'] = time(); // update the system time of repair
            if ($model->save(false)) {
                      $response["success"] = true;
                      $response["message"] = "Record Saved";
                    } else {
                      $response["message"] = "Record not saved";
                    }
        } else {
          // Error in entered asset code
          $response["message"] = "Check Entered data";
        }
        return $response;
      }
   
}