<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vac_fan".
 *
 * @property integer $vac_fan_id
 * @property integer $freq_id
 * @property integer $quarterly_cleaning
 * @property integer $quarterly_electrical_check
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
class VacFan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vac_fan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['freq_id'], 'required'],
            [['freq_id', 'quarterly_cleaning', 'quarterly_electrical_check', 'maint_type_id', 'eng_id'], 'integer'],
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
            'vac_fan_id' => 'VAC Fan ID',
            'freq_id' => 'Freq ID',
            'quarterly_cleaning' => 'Quarterly Cleaning',
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
