<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lift".
 *
 * @property integer $lift_id
 * @property integer $freq_id
 * @property integer $monthly_cleaning_list
 * @property integer $quaterly_cleaning_list
 * @property integer $halfyearly_cleaning_list
 * @property integer $lubricate
 * @property integer $monthly_visual_check
 * @property integer $halfyearly_visual_check
 * @property integer $annual_visual_check
 * @property integer $monthly_hoistway_inspection
 * @property integer $quaterly_hoistway_inspection
 * @property integer $halfyearly_hoistway_inspection
 * @property integer $monthly_door_inspection
 * @property integer $quaterly_door_inspection
 * @property integer $monthly_car_cabin_inspection
 * @property integer $annual_car_cabin_inspection
 * @property integer $monthly_safety_function
 * @property integer $halfyearly_safety_function
 * @property integer $annual_safety_function
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
class Lift extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lift';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['freq_id'], 'required'],
            [['freq_id', 'monthly_cleaning_list', 'quaterly_cleaning_list', 'halfyearly_cleaning_list', 'lubricate', 'monthly_visual_check', 'halfyearly_visual_check', 'annual_visual_check', 'monthly_hoistway_inspection', 'quaterly_hoistway_inspection', 'halfyearly_hoistway_inspection', 'monthly_door_inspection', 'quaterly_door_inspection', 'monthly_car_cabin_inspection', 'annual_car_cabin_inspection', 'monthly_safety_function', 'halfyearly_safety_function', 'annual_safety_function', 'maint_type_id', 'eng_id'], 'integer'],
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
            'lift_id' => 'Lift ID',
            'freq_id' => 'Freq ID',
            'monthly_cleaning_list' => 'Monthly Cleaning List',
            'quaterly_cleaning_list' => 'Quaterly Cleaning List',
            'halfyearly_cleaning_list' => 'Halfyearly Cleaning List',
            'lubricate' => 'Lubricate',
            'monthly_visual_check' => 'Monthly Visual Check',
            'halfyearly_visual_check' => 'Halfyearly Visual Check',
            'annual_visual_check' => 'Annual Visual Check',
            'monthly_hoistway_inspection' => 'Monthly Hoistway Inspection',
            'quaterly_hoistway_inspection' => 'Quaterly Hoistway Inspection',
            'halfyearly_hoistway_inspection' => 'Halfyearly Hoistway Inspection',
            'monthly_door_inspection' => 'Monthly Door Inspection',
            'quaterly_door_inspection' => 'Quaterly Door Inspection',
            'monthly_car_cabin_inspection' => 'Monthly Car Cabin Inspection',
            'annual_car_cabin_inspection' => 'Annual Car Cabin Inspection',
            'monthly_safety_function' => 'Monthly Functional and Safety Checks',
            'halfyearly_safety_function' => 'Halfyearly Functional and Safety Checks',
            'annual_safety_function' => 'Annual Functional and Safety Checks',
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
        return $this->hasOne(User::className(), ['id' => 'eng_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrequency()
    {
        return $this->hasOne(MaintenanceFrequency::className(), ['freq_id' => 'maint_type_id']);
    }

}
