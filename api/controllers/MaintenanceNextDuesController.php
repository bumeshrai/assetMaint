<?php
/* This code will be the called by the android program after it scans the asset code. 
* The entry will be permitted through a valid token only, obtained during login. 
* Asset code will be passed on as GET param. The name of the relevant API will be
* retrieved from the 'Maintenance Next Due' table. The table will be also searched for pending 
* maintenance schedules. The highest order maintenance will be done, under the presumption that
* lower order maintenance will be covered by it as default. The order of maintenance is sent as GET
* param to the next API in chain.
* Dr. B. Umesh Rai
*/


namespace api\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use common\models\MaintenanceNextDue;

class MaintenanceNextDuesController extends ActiveController
{
  public $modelClass = 'common\models\MaintenanceNextDue';

  /* Have access only through token. Uncomment the next method after prasanti implements this code in her 
  * android.
  * http://cmrlvent.in/assetMaint/api/web/maintenance-next-dues/?assetCode=0200260018000101&token=w5Tn7c2x6cQD-tbe17svdH1ZTvI8iD7B
  * Comment out the original behaviours
  */

  
  public function behaviors()
  {
    $behaviors = parent::behaviors();
    $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),
           'tokenParam' => 'token'
    ];
    return $behaviors;
  }


  /*

  
  public function behaviors()
  {
    $behaviors = parent::behaviors();

    $behaviors['authenticator'] = [

      // multiple authenticators
      'class' => CompositeAuth::className(),
      'authMethods' => [
        [
          // first authenticator
          'class' => HttpBasicAuth::className(),
          'auth' => function($username, $password)
          {
            $out = null;
            $user = \common\models\User::findByUsername($username);
            if($user!=null)
            {
              if($user->validatePassword($password)) 
                $out = $user;
            }
            // user is null
            return $out;
          }
        ],
        [
           'class' => QueryParamAuth::className(),
        ]
      ]
    ];
      
   return $behaviors;
  }

  public function actionAccessTokenByUser($username, $passwordHash)
  {
    $accessToken = null;
    $user = \common\models\User::findOne(['username' => $username, 'password_hash' => $passwordHash]);
    
    if($user!=null)
    {
      $user->access_token = \Yii::$app->security->generateRandomString();
      $user->save();
      $accessToken = $user->access_token;
    }        
      
    return [ 'access-token' => $accessToken ];
  }   

  */

  public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    /* Collects the asset code
    */
  public function actionIndex($assetCode)
    {
        // Get the API Controller name, stored in the model
        $record = \common\models\MaintenanceNextDue::find()->where(['asset_code' => $assetCode])->one(); 
        // Get the controller field. This will be the equipment name
        $maintenanceView = $record->controller;
        $maintenanceDue = '1';
        $todayDate = date('Y-m-d');
        // Check the highest order Maintenance due on this date and exit
        switch ($maintenanceDue) {
            case (strtotime($record->maint_triennial) <= strtotime($todayDate)):
                $maintenanceDue = '9';
                break;
            case (strtotime($record->maint_biennial) <= strtotime($todayDate)):
                $maintenanceDue = '8';
                break;
            case (strtotime($record->maint_annual) <= strtotime($todayDate)):
                $maintenanceDue = '7';
                break;
            case (strtotime($record->maint_biannual) <= strtotime($todayDate)):
                $maintenanceDue = '6';
                break;
            case (strtotime($record->maint_quaterly) <= strtotime($todayDate)):
                $maintenanceDue = '5';
                break;
            case (strtotime($record->maint_monthly) <= strtotime($todayDate)):
                $maintenanceDue = '4';
                break;
            case (strtotime($record->maint_fortnightly) <= strtotime($todayDate)):
                $maintenanceDue = '3';
                break;
            case (strtotime($record->maint_weekly) <= strtotime($todayDate)):
                $maintenanceDue = '2';
                break;
             default:
                break;
        }
        // Go to the API controller with the GET Variable set
        /*$response = array();
        $response["id"] = $maintenanceDue; 
        $response["equipment"] = $maintenanceView; 
        return ($response); */
        return  $this->redirect('../' . $maintenanceView . '/?id=' . $maintenanceDue);
    }
   
}