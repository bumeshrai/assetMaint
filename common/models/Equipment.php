<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "equipment".
 *
 * @property integer $equip_id
 * @property integer $corr_id
 * @property integer $ename_id
 * @property integer $manuf_id
 * @property integer $enos_id
 * @property integer $level_id
 * @property integer $stn_id
 * @property string $installation_date
 * @property integer $asset_code
 * @property string $last_major_overhaul
 * @property string $last_minor_maintenance
 *
 * @property Corridor $corr
 * @property EquipmentName $ename
 * @property Level $level
 * @property StationCode $stn
 */
class Equipment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['corr_id', 'ename_id', 'level_id', 'stn_id', 'enos_id'], 'required'],
            [['corr_id', 'ename_id', 'manuf_id', 'enos_id', 'level_id', 'stn_id', 'asset_code'], 'integer'],
            [['installation_date', 'last_major_overhaul', 'last_minor_maintenance'], 'safe'],
            [['corr_id'], 'exist', 'skipOnError' => true, 'targetClass' => Corridor::className(), 'targetAttribute' => ['corr_id' => 'corr_id']],
            [['ename_id'], 'exist', 'skipOnError' => true, 'targetClass' => EquipmentName::className(), 'targetAttribute' => ['ename_id' => 'ename_id']],
            [['level_id'], 'exist', 'skipOnError' => true, 'targetClass' => Level::className(), 'targetAttribute' => ['level_id' => 'level_id']],
            [['stn_id'], 'exist', 'skipOnError' => true, 'targetClass' => StationCode::className(), 'targetAttribute' => ['stn_id' => 'stn_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'equip_id' => 'Equip ID',
            'corr_id' => 'Select Corridor',
            'ename_id' => 'Select Equipment',
            'manuf_id' => 'Select Equipment Manufacturer',
            'enos_id' => 'Allot Equipment a Number',
            'level_id' => 'Location of Equipment',
            'stn_id' => 'Select Station Name',
            'installation_date' => 'Installation Date',
            'asset_code' => 'Asset Code',
            'last_major_overhaul' => 'Last Major Overhaul',
            'last_minor_maintenance' => 'Last Minor Maintenance',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCorridor_nos()
    {
        return $this->hasOne(Corridor::className(), ['corr_id' => 'corr_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment_name()
    {
        return $this->hasOne(EquipmentName::className(), ['ename_id' => 'ename_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocated_at()
    {
        return $this->hasOne(Level::className(), ['level_id' => 'level_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStation_name()
    {
        return $this->hasOne(StationCode::className(), ['stn_id' => 'stn_id']);
    }
    public function getBreakdown(){

      return $this->hasMany(Breakdown::className(),['asset_code' => 'asset_code']);
    }

    public function getDeptName()
    {
    return $this->hasOne(Department::classname(),['dept_id'=>'dept_id'])
                ->via('equipment_name');
    }
    public function getTotalFailure(){
      $count = Breakdown::find()
              ->where("asset_code = $this->asset_code")
              ->count();
      return $count;
    }

    public function getBdassetcode(){
     return $this->breakdown->asset_code;
   }

   public function getAttended(){

    $count=$this->find()->from('breakdown')
                ->where(['asset_code'=>$this->asset_code])
                ->sum('attended');
  return $count;
 }

  public function getPending(){
    $pending=$this->getTotalFailure()-$this->getAttended();
    return $pending;
  }


}
