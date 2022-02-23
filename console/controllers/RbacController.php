<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{

    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // Reset all
        $auth->removeAll();
        
        $permissions = [
            'createEquipment' => array('desc' => 'Create New Equipment'),
            'updateEquipment' => array('desc' => 'Update Equipment'),
            'deleteEquipment' => array('desc' => 'Delete Equipment'),

            'createEquipmentName' => array('desc' => 'Create Equipment Class'),
            'updateEquipmentName' => array('desc' => 'Update Equipment Class'),
            'deleteEquipmentName' => array('desc' => 'Delete Equipment Class'),

            'createManufacturer' => array('desc' => 'Create Manufacturer'),
            'updateManufacturer' => array('desc' => 'Update Manufacturer'),
            'deleteManufacturer' => array('desc' => 'Delete Manufacturer'),
        ];

        $roles = [
            'operator' => array('createEquipment'),
        ];
        
        // Add all permissions
        foreach($permissions as $keyP=>$valueP)
        {
            $p = $auth->createPermission($keyP);
            $p->description = $valueP['desc'];
            $auth->add($p);
            
            // add "operator" role and give this role the "createEquipment" permission
            $r = $auth->createRole('role_'.$keyP);
            $r->description = $valueP['desc'];
            $auth->add($r);
            if( false == $auth->hasChild($r, $p)) $auth->addChild($r, $p);
        }
        
        // Add all roles
        foreach($roles as $keyR=>$valueR)
        {
            $r = $auth->createRole($keyR);
            $r->description = $keyR;
            $auth->add($r);
            
            foreach($valueR as $permissionName)
            {
             if( false == $auth->hasChild($r, $auth->getPermission($permissionName))) $auth->addChild($r, $auth->getPermission($permissionName));
            }
            
        }
                
        // Add all permissions to admin role
        $r = $auth->createRole('admin');
        $r->description = 'admin';
        $auth->add($r);
        foreach($permissions as $keyP=>$valueP)
        {
            if( false == $auth->hasChild($r, $auth->getPermission($permissionName))) $auth->addChild($r, $auth->getPermission($keyP));
        }
    }
}