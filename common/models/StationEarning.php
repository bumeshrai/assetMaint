<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "station_earning".
 *
 * @property integer $earning_id
 * @property string $date_on
 * @property integer $stn_id
 * @property integer $cash
 * @property integer $card
 * @property integer $voucher
 * @property integer $web
 * @property integer $non_fare
 */
class StationEarning extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'station_earning';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_on', 'stn_id', 'cash'], 'required'],
            [['date_on'], 'safe'],
            [['stn_id', 'cash', 'card', 'voucher', 'web', 'non_fare'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'earning_id' => 'Earning ID',
            'date_on' => 'Date On',
            'stn_id' => 'Station',
            'cash' => 'Cash',
            'card' => 'Card',
            'voucher' => 'Voucher',
            'web' => 'Web',
            'non_fare' => 'Non Fare',
        ];
    }
}
