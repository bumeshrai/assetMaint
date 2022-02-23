<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "chiller".
 *
 * @property integer $chiller_id
 * @property integer $freq_id
 * @property integer $quarterly_functional_check
 * @property integer $quarterly_leak_testing_check
 * @property integer $daily_record_the_reading
 * @property integer $quarterly_record_the_reading
 * @property integer $quarterly_sensible_check
 * @property integer $quarterly_electrical_check
 * @property string $description
 * @property string $asset_code
 * @property integer $maint_type_id
 * @property integer $eng_id
 * @property string $contractor
 * @property string $created_at
 * @property string $updated_at
 */
class Chiller extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chiller';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['freq_id'], 'required'],
            [['freq_id', 'quarterly_functional_check', 'quarterly_leak_testing_check', 'daily_record_the_reading', 'quarterly_record_the_reading', 'quarterly_sensible_check', 'quarterly_electrical_check', 'maint_type_id', 'eng_id'], 'integer'],
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
            'chiller_id' => 'Chiller ID',
            'freq_id' => 'Freq ID',
            'quarterly_functional_check' => 'Quarterly Functional Check',
            'quarterly_leak_testing_check' => 'Quarterly Leak Testing Check',
            'daily_record_the_reading' => 'Daily Record The Reading',
            'quarterly_record_the_reading' => 'Quarterly Record The Reading',
            'quarterly_sensible_check' => 'Quarterly Sensible Check',
            'quarterly_electrical_check' => 'Quarterly Electrical Check',
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
