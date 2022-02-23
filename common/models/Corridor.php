<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "corridor".
 *
 * @property integer $corr_id
 * @property string $corr_name
 *
 * @property Equipment[] $equipments
 */
class Corridor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'corridor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['corr_name'], 'required'],
            [['corr_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'corr_id' => 'Corr ID',
            'corr_name' => 'Corr Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipments()
    {
        return $this->hasMany(Equipment::className(), ['corr_id' => 'corr_id']);
    }
}
