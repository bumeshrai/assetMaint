<?php
/* This code deciphers the asset code and returns the deciphered message to the caller.
* Dr. B. Umesh Rai
*/


namespace api\controllers;

use yii\rest\ActiveController;

 
class AssetCodeController extends ActiveController
{

	public $modelClass = 'common\models\Equipment';

	public function actionDecipher($assetCode) {

		
		$response = array();
        $response["success"] = false;  

        // Corridor is the first 2 digit
        $code = intval(substr($assetCode, 0, 2));
        $asset = \common\models\Corridor::findOne(['corr_id' => $code]);
        if($asset != null) {
        	$response["corridor"] = $asset->corr_name;
            $response["success"] = true; 
        }
        else
        	$response["corridor"] = "corridor code not found";

        // Station is the from 3rd digit to 6th digit
        $code = intval(substr($assetCode, 2, 4));
        $asset = \common\models\StationCode::findOne(['stn_id' => $code]);
    	if($asset != null)
        	$response["station"] = $asset->station_name;
        else
        	$response["station"] = "Station code is incorrect";

        // Equipment Name is the from 7th digit to 10th digit
        $code = intval(substr($assetCode, 6, 4));
        $asset = \common\models\EquipmentName::findOne(['ename_id' => $code]);
    	if($asset != null)
        	$response["equipment"] = $asset->ename_name;
        else
        	$response["equipment"] = "Equipment Name code is incorrect";
 
        // Equipment Number is the from 11th digit to 14th digit. 
        // Its plain number and not associated with any model
        $code = intval(substr($assetCode, 10, 4));
        $response["equipment_no"] = $code;
        
		// Location of equipment  is the from 14th digit to 16th digit
        $code = intval(substr($assetCode, 14, 2));
        $asset = \common\models\Level::findOne(['level_id' => $code]);
    	if($asset != null)
        	$response["location"] = $asset->level_name;
        else
        	$response["location"] = "Location code is incorrect";

        return $response;
        
	}

}