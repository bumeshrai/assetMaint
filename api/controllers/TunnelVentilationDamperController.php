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
use yii\filters\auth\QueryParamAuth;
use common\models\TunnelVentilationDamper;

class TunnelVentilationDamperController extends ActiveController
{
  public $modelClass = 'common\models\TunnelVentilationDamper';

  public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

  public function actionIndex($id)
    {
        return \common\models\TunnelVentilationDamper::find()->where(['freq_id' => $id])->one();    
    }
   
}