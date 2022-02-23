<?php

namespace api\components;

use yii\filters\auth\AuthMethod;
use Yii;

class SessionAuth extends AuthMethod {
  public $tokenParam = 'sid';

  public function authenticate($user, $request, $response) {
    $accessToken = $request->get($this->tokenParam);
    
    if (is_string($accessToken)) {
      
       Yii::$app->session->id = $accessToken;
       
       $identity = isset(Yii::$app->session['loggedUser'])?Yii::$app->session['loggedUser']:null;
            
          if ($identity !== null) {
             return $identity;
          }
    }
    if ($accessToken !== null) {
        $this -> handleFailure($response);
    }
    return null;
  }

}
