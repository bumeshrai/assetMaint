<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "power_reading".
 *
 * @property integer $reading_id
 * @property string $date_on
 * @property string $receiving_station
 * @property string $supply
 * @property integer $active_power
 * @property integer $total_power
 * @property integer $solar_generation
 * @property integer $maximum_demand
 * @property double $power_factor
 */
class PowerReading extends \yii\db\ActiveRecord
{
    
    public $MONTH;
    public $KWH;
    public $KVAH;
    public $MD;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'power_reading';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_on'], 'safe'],
            [['supply'], 'required'],
            [['active_power', 'total_power', 'solar_generation', 'maximum_demand'], 'integer'],
            [['power_factor'], 'number'],
            [['receiving_station'], 'string', 'max' => 25],
            [['supply'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'reading_id' => 'Reading ID',
            'date_on' => 'Date On',
            'receiving_station' => 'RSS',
            'supply' => 'Supply in KV',
            'active_power' => 'KWAH',
            'total_power' => 'KVAH',
            'solar_generation' => 'Solar Generation',
            'maximum_demand' => 'MD',
            'power_factor' => 'PF',
        ];
    }
}
