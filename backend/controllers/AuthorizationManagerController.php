<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use common\models\User;
//use common\models\LoginForm;


class AuthorizationManagerController extends Controller
{
    public function actionIndex()
    {
        $auth = Yii::$app->authManager;
        
        // Initialize authorizations to fill the table
        // Disable after the item and itemChild table are filled
        // The initialisation of authority table is moved to console/controller/RbacController
        //$this->initializeAuthorizations();

        // Get all users        
        $users = User::find()->all();
     
        // Initialize data
        $rolesAvailable = $auth->getRoles();
        $rolesNamesByUser = [];
        
        // For each user, fill $rolesNames with name of roles assigned to user
        foreach($users as $user)
        {
            $rolesNames = [];
            
            $roles = $auth->getRolesByUser($user->id);
            foreach($roles as $r)
            {
                $rolesNames[] = $r->name;
            }
            
            $rolesNamesByUser[$user->id] = $rolesNames;
        }
        
        return $this->render('index', ['users' => $users, 'rolesAvailable' => $rolesAvailable, 'rolesNamesByUser' => $rolesNamesByUser]);
    }

    
    public function actionAddRole($userId, $roleName)
    {
        $auth = Yii::$app->authManager;
        
        $auth->assign($auth->getRole($roleName), $userId);
        
        return $this->redirect(['index']);
    }
    
    public function actionRemoveRole($userId, $roleName)
    {
        $auth = Yii::$app->authManager;
        
        $auth->revoke($auth->getRole($roleName), $userId);
        
        return $this->redirect(['index']);
    }

}
