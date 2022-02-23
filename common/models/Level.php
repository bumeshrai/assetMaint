<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "level".
 *
 * @property integer $level_id
 * @property string $level_name
 *
 * @property Equipment[] $equipments
 */
class Level extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'level';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level_name'], 'required'],
            [['level_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'level_id' => 'Location ID',
            'level_name' => 'Location Label',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipments()
    {
        return $this->hasMany(Equipment::className(), ['level_id' => 'level_id']);
    }
}
