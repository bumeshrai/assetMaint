<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "maintenance_frequency".
 *
 * @property integer $id
 * @property integer $freq_id
 * @property string $frequency
 * @property string $description
 */
class MaintenanceFrequency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maintenance_frequency';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['freq_id', 'frequency'], 'required'],
            [['freq_id'], 'integer'],
            [['description'], 'string'],
            [['frequency'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'freq_id' => 'Freq ID',
            'frequency' => 'Frequency',
            'description' => 'Description',
        ];
    }
}
