<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vrf".
 *
 * @property integer $vrf_id
 * @property integer $freq_id
 * @property integer $weekly_cleaning
 * @property integer $monthly_cleaning
 * @property integer $quarterly_cleaning
 * @property integer $annually_cleaning
 * @property integer $monthly_functional_check
 * @property integer $quarterly_functional_check
 * @property integer $monthly_record_the_readings
 * @property integer $quarterly_sensible_check
 * @property integer $weekly_lubrication_check
 * @property integer $weekly_electrical_check
 * @property integer $quarterly_electrical_check
 * @property integer $annually_electrical_check
 * @property integer $quarterly_mechanical_check
 * @property string $description
 * @property string $asset_code
 * @property integer $maint_type_id
 * @property integer $eng_id
 * @property string $contractor
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $eng
 * @property MaintenanceFrequency $frequency
 */
class Vrf extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vrf';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['freq_id'], 'required'],
            [['freq_id', 'weekly_cleaning', 'monthly_cleaning', 'quarterly_cleaning', 'annually_cleaning', 'monthly_functional_check', 'quarterly_functional_check', 'monthly_record_the_readings', 'quarterly_sensible_check', 'weekly_lubrication_check', 'weekly_electrical_check', 'quarterly_electrical_check', 'annually_electrical_check', 'quarterly_mechanical_check', 'maint_type_id', 'eng_id'], 'integer'],
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
            'vrf_id' => 'Vrf ID',
            'freq_id' => 'Freq ID',
            'weekly_cleaning' => 'Weekly Cleaning',
            'monthly_cleaning' => 'Monthly Cleaning',
            'quarterly_cleaning' => 'Quarterly Cleaning',
            'annually_cleaning' => 'Annually Cleaning',
            'monthly_functional_check' => 'Monthly Functional Check',
            'quarterly_functional_check' => 'Quarterly Functional Check',
            'monthly_record_the_readings' => 'Monthly Record The Readings',
            'quarterly_sensible_check' => 'Quarterly Sensible Check',
            'weekly_lubrication_check' => 'Weekly Lubrication Check',
            'weekly_electrical_check' => 'Weekly Electrical Check',
            'quarterly_electrical_check' => 'Quarterly Electrical Check',
            'annually_electrical_check' => 'Annually Electrical Check',
            'quarterly_mechanical_check' => 'Quarterly Mechanical Check',
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
