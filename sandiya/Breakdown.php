<?php

namespace common\models;

use Yii;
use common\models\StationCode;

/**
 * This is the model class for table "breakdown".
 *
 * @property integer $bd_id
 * @property string $asset_code
 * @property integer $dept_id
 * @property string $reported_by
 * @property integer $attended
 * @property integer $classify_BD
 * @property integer $resp_contractor
 * @property integer $reporting_time
 * @property string $attended_by
 * @property integer $repaired_time
 * @property string $bd_description
 * @property string $repair_description
 */
class Breakdown extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'breakdown';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['asset_code', 'reported_by', 'reporting_time'], 'required'],
            [['dept_id','attended', 'classify_BD', 'resp_contractor', 'reporting_time', 'repaired_time'], 'integer'],
            [['bd_description', 'repair_description'], 'string'],
            [['asset_code'], 'string', 'max' => 20],
            [['reported_by', 'attended_by'], 'string', 'max' => 255],
            [['dept_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bd_id' => 'Bd ID',
            'asset_code' => 'Asset Code',
            'reported_by' => 'Reported By',
            'attended' => 'Attended',
            'classify_BD' => 'Classify  Bd',
            'resp_contractor' => 'Resp Contractor',
            'reporting_time' => 'Reporting Time',
            'attended_by' => 'Attended By',
            'repaired_time' => 'Repaired Time',
            'bd_description' => 'Bd Description',
            'repair_description' => 'Repair Description',
        ];
    }


    /* Getter for calculated */
    public function getRepairTime() {
        if ($this->repaired_time != NULL) {
            // get the quotient for number of days. Total seconds to day
            $days =  floor(($this->repaired_time -  $this->reporting_time)/(24*3600));
            if ($days != 0)
                // mktime function input will be number of seconds derived from the epoch time
                return  $days . 'day ' . date('H:i:s', mktime(0, 0, $this->repaired_time -  $this->reporting_time));
            else
                return  date('H:i:s', mktime(0, 0, $this->repaired_time -  $this->reporting_time));
        } else {
            $days =  floor((time() -  $this->reporting_time)/(24*3600));
            if ($days != 0)
                return  $days . 'day ' . date('H:i:s', mktime(0, 0, time() -  $this->reporting_time));
            else
                return  date('H:i:s', mktime(0, 0, time() -  $this->reporting_time));
        }
    }
/* public function getStationName(){
    $code=intval(substr($this->asset_code,2,4));
    $asset=\common\models\StationCode::findOne(['stn_id' => $code]);
return $asset->station_name;}

public function getEquipmentName(){
  $code=intval(substr($this->asset_code,6,4));
  $asset=\common\models\EquipmentName::findOne(['ename_id' => $code]);
return $asset->ename_name;}

public function getLocation(){
  $code=intval(substr($this->asset_code,14,2));
  $asset=\common\models\Level::findOne(['level_id' => $code]);
return $asset->level_name;}*/

   public function getStationName()
  {
    return $this->hasOne(StationCode::className(),['stn_id'=>'stn_id'])
                ->via('equipment');
  }


public function getEquipmentName()
{ return $this->hasOne(EquipmentName::className(),['ename_id'=>'ename_id'])
              ->via('equipment');
    }

public function getLevelName()
{ return $this->hasOne(Level::className(),['level_id'=>'level_id'])
              ->via('equipment');
    }

public function getEquipment()
{
return $this->hasOne(Equipment::classname(),['asset_code'=>'asset_code']);
    }
public function getDeptName()
  {
    return $this->hasOne(Department::classname(),['dept_id'=>'dept_id']);
  }

  public function getTotalFailure(){

    $count = Breakdown::find()
            ->where("asset_code = $this->asset_code")
            ->count();
    return $count;
  }
  }
