<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "locate_api_controller".
 *
 * @property integer $id
 * @property string $equipment_name
 * @property string $view_name
 */
class LocateApiController extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'locate_api_controller';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['equipment_name', 'view_name'], 'required'],
            [['equipment_name', 'view_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'equipment_name' => 'Equipment Name',
            'view_name' => 'View Name',
        ];
    }
}
