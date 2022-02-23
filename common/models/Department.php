<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "level".
 *
 * @property integer $level_id
 * @property string $level_name
 *
 * @property Department[] $equipments
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dept_name'], 'required'],
            [['dept_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dept_id' => 'Deaprtment ID',
            'dept_name' => 'Department',
        ];
    }

}
