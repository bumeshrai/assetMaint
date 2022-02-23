<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cooling_tower".
 *
 * @property integer $cooling_tower_id
 * @property integer $freq_id
 * @property integer $monthly_cleaning
 * @property integer $quarterly_cleaning
 * @property integer $daily_sensible_check
 * @property integer $quarterly_sensible_check
 * @property integer $quarterly_lubrication_check
 * @property integer $monthly_electrical_check
 * @property integer $quarterly_electrical_check
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
class CoolingTower extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cooling_tower';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['freq_id'], 'required'],
            [['freq_id', 'monthly_cleaning', 'quarterly_cleaning', 'daily_sensible_check', 'quarterly_sensible_check', 'quarterly_lubrication_check', 'monthly_electrical_check', 'quarterly_electrical_check', 'quarterly_mechanical_check', 'maint_type_id', 'eng_id'], 'integer'],
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
            'cooling_tower_id' => 'Cooling Tower ID',
            'freq_id' => 'Freq ID',
            'monthly_cleaning' => 'Monthly Cleaning',
            'quarterly_cleaning' => 'Quarterly Cleaning',
            'daily_sensible_check' => 'Daily Sensible Check',
            'quarterly_sensible_check' => 'Quarterly Sensible Check',
            'quarterly_lubrication_check' => 'Quarterly Lubrication Check',
            'monthly_electrical_check' => 'Monthly Electrical Check',
            'quarterly_electrical_check' => 'Quarterly Electrical Check',
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
