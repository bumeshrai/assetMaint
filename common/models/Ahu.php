<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ahu".
 *
 * @property integer $ahu_ID
 * @property integer $freq_ID
 * @property integer $weekly_cleaning
 * @property integer $quarterly_cleaning
 * @property integer $annually_cleaning
 * @property integer $daily_record_the_readings
 * @property integer $halfyearly_record_the_readings
 * @property integer $halfyearly_sensible_check
 * @property integer $annually_sensible_check
 * @property integer $monthly_tightness_check
 * @property integer $annually_tightness_check
 * @property integer $quarterly_lubircation
 * @property integer $quarterly_electrical_check
 * @property integer $quarterly_mechanical_check
 * @property integer $halfyearly_mechanical_check
 * @property string $description
 * @property string $asset_code
 * @property integer $maint_type_id
 * @property integer $eng_id
 * @property string $contractor
 * @property string $created_at
 * @property string $updated_at
 */
class Ahu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ahu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ahu_ID'], 'required'],
            [['ahu_ID', 'freq_ID', 'weekly_cleaning', 'quarterly_cleaning', 'annually_cleaning', 'daily_record_the_readings', 'halfyearly_record_the_readings', 'halfyearly_sensible_check', 'annually_sensible_check', 'monthly_tightness_check', 'annually_tightness_check', 'quarterly_lubircation', 'quarterly_electrical_check', 'quarterly_mechanical_check', 'halfyearly_mechanical_check', 'maint_type_id', 'eng_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['description'], 'string', 'max' => 500],
            [['asset_code'], 'string', 'max' => 20],
            [['contractor'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ahu_ID' => 'Ahu  ID',
            'freq_ID' => 'Freq  ID',
            'weekly_cleaning' => 'Weekly Cleaning',
            'quarterly_cleaning' => 'Quarterly Cleaning',
            'annually_cleaning' => 'Annually Cleaning',
            'daily_record_the_readings' => 'Daily Readings',
            'halfyearly_record_the_readings' => 'Halfyearly Readings',
            'halfyearly_sensible_check' => 'Halfyearly Sensible Check',
            'annually_sensible_check' => 'Annually Sensible Check',
            'monthly_tightness_check' => 'Monthly Tightness Check',
            'annually_tightness_check' => 'Annually Tightness Check',
            'quarterly_lubircation' => 'Quarterly Lubircation',
            'quarterly_electrical_check' => 'Quarterly Electrical Check',
            'quarterly_mechanical_check' => 'Quarterly Mechanical Check',
            'halfyearly_mechanical_check' => 'Halfyearly Mechanical Check',
            'description' => 'Description',
            'asset_code' => 'Asset Code',
            'maint_type_id' => 'Maint Type ID',
            'eng_id' => 'Eng ID',
            'contractor' => 'Contractor',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEng()
    {
        //Establishes the relationship. The field of related tabel can be retrieved. e.g: 'eng.username'
        return $this->hasOne(User::className(), ['id' => 'eng_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrequency()
    {
        //Establishes the relationship. The field of related tabel can be retrieved. e.g: 'frequency.frequency'
        return $this->hasOne(MaintenanceFrequency::className(), ['freq_id' => 'maint_type_id']);
    }
}
