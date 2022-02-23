<?php
/* This code will be the entry point for the android program.
* The Android device supplies the username and password for validation. Once validated, the code first 
* updates the last login date. Then it generates a random authority key, which it stores and also hands 
* over to the calling program. It also supplies the username and id to the caller.
* Dr. B. Umesh Rai
*/

namespace api\controllers;

use yii\rest\ActiveController;
use common\models\User;
use common\models\LoginForm;

 
class UserController extends ActiveController
{
 
    public $modelClass = 'common\models\User';

    
	public function actionLogin()
    {
        $model = new LoginForm(); // For log in
        $updateModel = new User(); // Used after successful login
        $response = array();
    	$response["success"] = false;  // preload the response with default value
        $response["message"] = "Login failed, Check username/password";

        if ($model->load(\Yii::$app->getRequest()->getBodyParams(), '') && $model->login()) {

       		$params = \Yii::$app->request->post();
            // Update the User Model with this login
        	$updateModel = User::findOne(['username' => $params['username'] ]);
        	$date = date('Y-m-d H:i:s');
		 	$updateModel->last_login = $date;
            $updateModel->last_latitude = $params["latitude"];
            $updateModel->last_longitude = $params["longitude"];
            // Update the User Model key with new random string
		 	$updateModel->auth_key = \Yii::$app->security->generateRandomString();
		 	
		 	if ($updateModel->save()) {
	         	$response["success"] = true;
                $response["message"] = "Login success";
                $response["id"] = $updateModel['id'];
			 	$response["username"] = $updateModel['username'];
                $response['organisation'] = $updateModel['organisation'];
                $response['latitude'] = $updateModel['last_latitude'];
                $response['longitude'] = $updateModel['last_longitude'];
                $response['auth_key'] = $updateModel['auth_key'];
		 	}
        }

        return $response;
    }
}