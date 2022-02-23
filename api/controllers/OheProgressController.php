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
use common\models\OheProgress;
use \common\models\User;

class OheProgressController extends ActiveController
{
    public $modelClass = 'common\models\OheProgress';

    
    public function actions()
      {
          $actions = parent::actions();
          unset($actions['index'], $actions['create'], $actions['update']);
          return $actions;
      }

    /*
    * Returns all the tension length where the work is completed
    */
    public function actionIndex()
      {
          return \common\models\OheProgress::find()->select('ohe_id,section,tension_number')
          ->where(['work_completed' => 0])
          ->andWhere(['under_progress' => 1])
          ->all(); 
      }

      /* Generate the breakdown alert and store it
      */
    /*public function actionCreate()
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
      */

      /*
      * The record is updated by adding up the work done in that tension length.
      * The response carries the updated record values and the total work to be completed.
      */
      public function actionUpdate()
      {
        //Capture the posted data for id
        $params = \Yii::$app->request->post();
        // get the record for the requested id
        $model = \common\models\OheProgress::find()->where(['ohe_id' => $params['ohe_id']])->one();
        
        $response = array();
        $response["success"] = false;  // preload the response with default value

        $model['date_finished'] = date('Y-m-d'); // update the system time of repair
        $model['expansion_joint_completed'] += $params['expansionJoint'];
        $model['marking_completed'] += $params['marking'];
        $model['bolt_completed'] += $params['bolt'];
        $model['bracket_completed'] += $params['bracket'];
        $model['rail_completed'] += $params['rail'];
        $model['contact_wire_completed'] += $params['contactWire'];
        $model['aec_erection_completed'] += $params['aecErection'];
        $model['aec_clamping_completed'] += $params['aecClamping'];
        $model['bec_laying_completed'] += $params['becLaying'];
        $model['met_fixing_completed'] += $params['metFixing'];
        $model['bracket_adjustment'] = $params['bracketAdjustment'];
        $model['stagger_adjustment'] = $params['staggerAdjustment'];

        if ($model->save(false)) {
            $response["success"] = true;
            $response["message"] = "Record Saved";
            $response["section"] = $model['section'];
            $response["tension_number"] = $model['tension_number'];
            $response["expansion_joint_completed"] = $model['expansion_joint_completed'];
            $response["expansion_joint_total"] = $model['expansion_joint_total'];
            $response["marking_completed"] = $model['marking_completed'];
            $response["marking_total"] = $model['marking_total'];
            $response["bolt_completed"] = $model['bolt_completed'];
            $response["bolt_total"] = $model['bolt_total'];
            $response["bracket_completed"] = $model['bracket_completed'];
            $response["bracket_total"] = $model['bracket_total'];
            $response["rail_completed"] = $model['rail_completed'];
            $response["rail_total"] = $model['rail_total'];
            $response["contact_wire_completed"] = $model['contact_wire_completed'];
            $response["contact_wire_total"] = $model['contact_wire_total'];
            $response["aec_erection_completed"] = $model['aec_erection_completed'];
            $response["aec_erection_total"] = $model['aec_erection_total'];
            $response["aec_clamping_completed"] = $model['aec_clamping_completed'];
            $response["aec_clamping_total"] = $model['aec_clamping_total'];
            $response["bec_laying_completed"] = $model['bec_laying_completed'];
            $response["bec_laying_completed"] = $model['bec_laying_completed'];
            $response["bec_laying_total"] = $model['bec_laying_total'];
            $response["met_fixing_completed"] = $model['met_fixing_completed'];
            $response["met_fixing_total"] = $model['met_fixing_total'];
            $response["bracket_adjustment"] = $model['bracket_adjustment'];
            $response["stagger_adjustment"] = $model['stagger_adjustment'];
            $response["time"] = $model['date_finished'];
        } else {
          $response["message"] = "Record not saved";
        }
        return $response;
      }  
}