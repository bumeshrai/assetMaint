<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "equipment_name".
 *
 * @property integer $ename_id
 * @property string $ename_name
 * @property integer $maint_daily
 * @property integer $maint_weekly
 * @property integer $maint_fortnightly
 * @property integer $maint_monthly
 * @property integer $maint_quaterly
 * @property integer $maint_biannual
 * @property integer $maint_annual
 * @property integer $maint_biennial
 * @property integer $maint_triennial
 *
 * @property Equipment[] $equipments
 * @property Manufacturer[] $manufacturers
 */
class EquipmentName extends \yii\db\ActiveRecord
{
    
    public $manufacturerAdd;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipment_name';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ename_name'], 'required'],
            [['maint_daily', 'maint_weekly', 'maint_fortnightly', 'maint_monthly', 'maint_quaterly', 'maint_biannual', 'maint_annual', 'maint_biennial', 'maint_triennial'], 'integer'],
            [['ename_name'], 'string', 'max' => 50],
            ['manufacturerAdd', 'integer', 'min' => 0, 'max' => 1],
    ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ename_id' => 'Ename ID',
            'ename_name' => 'Ename Name',
            'maint_daily' => 'Daily',
            'maint_weekly' => 'Weekly',
            'maint_fortnightly' => 'Fortnightly',
            'maint_monthly' => 'Monthly',
            'maint_quaterly' => '3 Monthly',
            'maint_biannual' => '6 Monthly',
            'maint_annual' => 'Annually',
            'maint_biennial' => 'Every 2 Years',
            'maint_triennial' => 'Every 3 Years',
            'manufacturerAdd' => 'Add Manufacturer',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipments()
    {
        return $this->hasMany(Equipment::className(), ['ename_id' => 'ename_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManufacturers()
    {
        return $this->hasMany(Manufacturer::className(), ['ename_id' => 'ename_id']);
    }
}
