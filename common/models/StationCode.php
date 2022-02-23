<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "station_code".
 *
 * @property integer $stn_id
 * @property string $station_name
 * @property string $station_code
 * @property integer $corr_id
 *
 * @property Equipment[] $equipments
 */
class StationCode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'station_code';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['station_name'], 'required'],
            [['corr_id'], 'integer'],
            [['station_name'], 'string', 'max' => 50],
            [['station_code'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stn_id' => 'Stn ID',
            'station_name' => 'Station Name',
            'station_code' => 'Station Code',
            'corr_id' => 'Corr ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipments()
    {
        return $this->hasMany(Equipment::className(), ['stn_id' => 'stn_id']);
    }
}
