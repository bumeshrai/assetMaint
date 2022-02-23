<?php

/* Thisprogram will be called twice in the maintenance chain.
* Firstly it is called by the MaintenanceNextDuesController requesting it to send to the Android device 
* the list of Maintenance tasks to be performed for scheduled hierarchy of maintenance.
* Later on its called by the Android device to save the work that has been done by service engineer. On
* succesful updation it will send back the success message with the service engineer details.
* Dr. B. Umesh Rai
*/

namespace api\controllers;

use yii\rest\ActiveController;
use common\models\Lift;

class LiftController extends ActiveController
{
  public $modelClass = 'common\models\Lift';

  public function actions()
    {
        $actions = parent::actions();
        unset($actions['index'], $actions['create']);
        return $actions;
    }

  public function actionIndex($id)
    {
        return \common\models\Lift::find()->where(['freq_id' => $id])->one();    
    }

  public function actionCreate()
    {
        $model = new \common\models\Lift();
        $response = array();
        $response["success"] = false;  
        $response["message"] = "Failed to save Record"; 
        
        if ($model->load(\Yii::$app->getRequest()->getBodyParams(), '')) {
                // Puts todays date
                $date = date('Y-m-d H:i:s');
                $model->created_at = $date;
                $model->maint_type_id = $model->freq_id;

                $maintenanceNextDue = \common\models\MaintenanceNextDue::find()
                    ->where(['asset_code' => $model->asset_code])->one();

                // Get all maintenance schedule subset to the present schedule
                $maintenanceFrequency = \common\models\MaintenanceFrequency::find()
                    ->where(['<=','freq_id', $model->freq_id])
                    ->andWhere(['>','freq_id', 0])
                    ->all();

                // Update the dates
                $record = array();
                foreach($maintenanceFrequency as $record) {
                    $response["frequency"] = $record["frequency"];
                    switch ($record["frequency"]) {
                        case "maint_daily":
                            if ($maintenanceNextDue->maint_daily <= $date)
                                    $maintenanceNextDue->maint_daily = 
                                                            Date('Y-m-d', strtotime("+3 days"));;
                            break;
                        case "maint_weekly":
                            if ($maintenanceNextDue->maint_weekly <= $date)
                                    $maintenanceNextDue->maint_weekly = 
                                                            Date('Y-m-d', strtotime("+7 days"));
                            break;
                        case "maint_fortnightly":
                            if ($maintenanceNextDue->maint_fortnightly <= $date)
                                    $maintenanceNextDue->maint_fortnightly = 
                                                            Date('Y-m-d', strtotime("+15 days"));
                            break;
                        case "maint_monthly":
                            if ($maintenanceNextDue->maint_monthly <= $date)
                                    $maintenanceNextDue->maint_monthly = 
                                                            Date('Y-m-d', strtotime("+1 months"));
                            break;
                        case "maint_quaterly":
                            if ($maintenanceNextDue->maint_quaterly <= $date)
                                    $maintenanceNextDue->maint_quaterly = 
                                                            Date('Y-m-d', strtotime("+3 months"));
                            break;
                        case "maint_biannual":
                            if ($maintenanceNextDue->maint_biannual <= $date)
                                    $maintenanceNextDue->maint_biannual = 
                                                            Date('Y-m-d', strtotime("+6 months"));
                            break;
                        case "maint_annual":
                            if ($maintenanceNextDue->maint_annual <= $date)
                                    $maintenanceNextDue->maint_annual = 
                                                            Date('Y-m-d', strtotime("+1 years"));
                            break;
                        case "maint_biennial":
                            if ($maintenanceNextDue->maint_biennial <= $date)
                                    $maintenanceNextDue->maint_biennial = 
                                                            Date('Y-m-d', strtotime("+2 years"));
                            break;
                        case "maint_triennial":
                            if ($maintenanceNextDue->maint_triennial <= $date)
                                    $maintenanceNextDue->maint_triennial = 
                                                            Date('Y-m-d', strtotime("+3 years"));
                            break;
                    }
                }
    
                
                $user = \common\models\User::find()->where(['id' => $model->eng_id])->one();
                $model->contractor = $user->organisation;
                $model->freq_id = 0;
                if($model->save() && $maintenanceNextDue->save()){ // Comment for testing
                //if($model->save()){ // Comment for updating the Maintenance dates
                        $response["success"] = true;
                        $response["userId"] = $user->id;
                        $response["username"] = $user->username;
                        $response["organisation"] = $user->organisation;
                        $response["message"] = "Saved Record"; 
                } 
        }

        return ($response); 
    }
}
