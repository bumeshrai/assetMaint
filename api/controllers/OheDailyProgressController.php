<?php

namespace api\controllers;

use Yii;
use common\models\OheDailyProgress;
use common\models\ManhourWeightage;
use common\models\OheProgress;
use yii\rest\ActiveController;
/**
 * OheDailyProgressController implements the CRUD actions for OheDailyProgress model.
 */
class OheDailyProgressController extends ActiveController
{
    public $modelClass = 'common\models\OheDailyProgress';
    
    public function actions()
      {
          $actions = parent::actions();
          unset($actions['index'], $actions['create'], $actions['update']);
          return $actions;
      }

    /*
    * Returns all records
    */
    public function actionIndex()
    {
        return OheDailyProgress::find()->all(); 
    }

    

    /**
     * Saves the work done on that day. One record per tension length
     */
    public function actionCreate()
    {
        $model = new OheDailyProgress();

        $response = array();
        $response["success"] = false;  // preload the response with default value
        $params = \Yii::$app->request->post();

        
        $model['date_worked'] = date('Y-m-d');
        $model['tension_number'] = $params['tension_number'];
        $model['section'] = $params['section'];
        if ($params['expansionJoint'] != null)
            $model['expansion_joint_completed'] = $params['expansionJoint'];
        else
            $model['expansion_joint_completed'] = 0;
        if ($params['marking'] != null)
            $model['marking_completed'] = $params['marking'];
        else
            $model['marking_completed'] = 0;
        if ($params['bolt'] != null)
            $model['bolt_completed'] = $params['bolt'];
        else
            $model['bolt_completed'] = 0;
        if ($params['bracket'] != null)
            $model['bracket_completed'] = $params['bracket'];
        else
            $model['bracket_completed'] = 0;
        if ($params['rail'] != null)
            $model['rail_completed'] = $params['rail'];
        else
            $model['rail_completed'] = 0;
        if ($params['contactWire'] != null)
            $model['contact_wire_completed'] = $params['contactWire'];
        else
            $model['contact_wire_completed'] = 0;
        if ($params['aecErection'] != null)
            $model['aec_erection_completed'] = $params['aecErection'];
        else
            $model['aec_erection_completed'] = 0;
        if ($params['aecClamping'] != null)
            $model['aec_clamping_completed'] = $params['aecClamping'];
        else
            $model['aec_clamping_completed'] = 0;
        if ($params['becLaying'] != null)
            $model['bec_laying_completed'] = $params['becLaying'];
        else
            $model['bec_laying_completed'] = 0;

        if ($params['metFixing'] != null)
            $model['met_fixing_completed'] = $params['metFixing'];
        else
            $model['met_fixing_completed'] = 0;

        if ($params['bracketAdjustment'] != null)
            $model['bracket_adjustment'] = $params['bracketAdjustment'];
        else
            $model['bracket_adjustment'] = 0;
        
        if ($params['staggerAdjustment'] != null)
            $model['stagger_adjustment'] = $params['staggerAdjustment'];
        else
            $model['stagger_adjustment'] = 0;
        $model['manhours_factor'] = $this->calculateFactor($model);

        if ($model->save(false)) {
            $response["success"] = true;
            $response["message"] = "Record Saved";
            $response["weightage"] = "Entered Weightage Factor";
        } else {
            $response["message"] = "Record not saved";
        }

        return $response;
    }

    /**
     * 
     */
    public function actionUpdate($id)
    {
        
    }

    /**
     * Returns the weightage array
     */
    public function weightage() {
        if (($modelWeightage = ManhourWeightage::findOne(1)) !== null) {
            return $modelWeightage;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Returns the ManHour Factors for the day. Weights from the ManhourWeightage table,
     * Total equipment erection of the section from the OheProgress table and the daily
     * work completed from the calling function are extracted and Manhours factor calculated
     */
    public function calculateFactor($model) {
        
        // Find the total number of equipment to be erected in the tension length
        $total = OheProgress::find()->where(['tension_number' => $model['tension_number']])->one(); 
        
        if ($total  !== null) {
            // get the weights for each works
            $weights = $this->weightage();
            // Calculate the work factor for the day
            $manhours_factor = 
                $model['expansion_joint_completed'] * $weights['expansion_joint_completed'] 
                + $model['marking_completed'] * $weights['marking_completed'] 
                + $model['bolt_completed'] * $weights['bolt_completed'] 
                + $model['bracket_completed'] * $weights['bracket_completed'] 
                + $model['rail_completed'] * $weights['rail_completed'] 
                + $model['contact_wire_completed'] * $weights['contact_wire_completed'] 
                + $model['aec_erection_completed'] * $weights['aec_erection_completed'] 
                + $model['aec_clamping_completed'] * $weights['aec_clamping_completed'] 
                + $model['bec_laying_completed'] * $weights['bec_laying_completed'] 
                + $model['met_fixing_completed'] * $weights['met_fixing_completed'] 
                + $model['bracket_adjustment'] * $weights['bracket_adjustment']
                + $model['stagger_adjustment'] * $weights['stagger_adjustment']
                ;
            return $manhours_factor;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
