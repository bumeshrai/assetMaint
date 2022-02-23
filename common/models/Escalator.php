<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "escalator".
 *
 * @property integer $escl_id
 * @property integer $freq_id
 * @property integer $clean_component_list
 * @property integer $lubricate_chains
 * @property integer $grease_shaft_bushes
 * @property integer $quaterly_visual_check
 * @property integer $halfyearly_visual_check
 * @property integer $annual_visual_check
 * @property integer $monthly_step_inspection
 * @property integer $quaterly_step_inspection
 * @property integer $halfyearly_step_inspection
 * @property integer $annual_step_inspection
 * @property integer $monthly_step_chain_inspection
 * @property integer $halfyearly_step_chain_inspection
 * @property integer $annual_step_chain_inspection
 * @property integer $monthly_comb_inspection
 * @property integer $annual_comb_inspection
 * @property integer $handrail_inspection
 * @property integer $drive_chain_inspection
 * @property integer $monthly_machinery_inspection
 * @property integer $halfyearly_machinery_inspection
 * @property integer $annual_machinery_inspection
 * @property integer $monthly_brake_inspection
 * @property integer $halfyearly_brake_inspection
 * @property integer $monthly_safety_function
 * @property integer $halfyearly_safety_function
 * @property integer $monthly_operative_function
 * @property integer $halfyearly_operative_function
 * @property integer $annual_operative_function
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
class Escalator extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'escalator';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['freq_id'], 'required'],
            [['freq_id', 'clean_component_list', 'lubricate_chains', 'grease_shaft_bushes', 'quaterly_visual_check', 'halfyearly_visual_check', 'annual_visual_check', 'monthly_step_inspection', 'quaterly_step_inspection', 'halfyearly_step_inspection', 'annual_step_inspection', 'monthly_step_chain_inspection', 'halfyearly_step_chain_inspection', 'annual_step_chain_inspection', 'monthly_comb_inspection', 'annual_comb_inspection', 'handrail_inspection', 'drive_chain_inspection', 'monthly_machinery_inspection', 'halfyearly_machinery_inspection', 'annual_machinery_inspection', 'monthly_brake_inspection', 'halfyearly_brake_inspection', 'monthly_safety_function', 'halfyearly_safety_function', 'monthly_operative_function', 'halfyearly_operative_function', 'annual_operative_function', 'maint_type_id', 'eng_id'], 'integer'],
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
            'escl_id' => 'Escl ID',
            'freq_id' => 'Freq ID',
            'clean_component_list' => 'Clean Component List',
            'lubricate_chains' => 'Lubricate Chains',
            'grease_shaft_bushes' => 'Grease Shaft Bushes',
            'quaterly_visual_check' => 'Quaterly Visual Check',
            'halfyearly_visual_check' => 'Halfyearly Visual Check',
            'annual_visual_check' => 'Annual Visual Check',
            'monthly_step_inspection' => 'Monthly Step Inspection',
            'quaterly_step_inspection' => 'Quaterly Step Inspection',
            'halfyearly_step_inspection' => 'Halfyearly Step Inspection',
            'annual_step_inspection' => 'Annual Step Inspection',
            'monthly_step_chain_inspection' => 'Monthly Step Chain Inspection',
            'halfyearly_step_chain_inspection' => 'Halfyearly Step Chain Inspection',
            'annual_step_chain_inspection' => 'Annual Step Chain Inspection',
            'monthly_comb_inspection' => 'Monthly Comb Inspection',
            'annual_comb_inspection' => 'Annual Comb Inspection',
            'handrail_inspection' => 'Handrail Inspection',
            'drive_chain_inspection' => 'Drive Chain Inspection',
            'monthly_machinery_inspection' => 'Monthly Machinery Inspection',
            'halfyearly_machinery_inspection' => 'Halfyearly Machinery Inspection',
            'annual_machinery_inspection' => 'Annual Machinery Inspection',
            'monthly_brake_inspection' => 'Monthly Brake Inspection',
            'halfyearly_brake_inspection' => 'Halfyearly Brake Inspection',
            'monthly_safety_function' => 'Monthly Safety Function',
            'halfyearly_safety_function' => 'Halfyearly Safety Function',
            'monthly_operative_function' => 'Monthly Operative Function',
            'halfyearly_operative_function' => 'Halfyearly Operative Function',
            'annual_operative_function' => 'Annual Operative Function',
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
        //Establishes the relationship. The field of related tabel can be retrieved. e.g: 'eng.username'
        return $this->hasOne(User::className(), ['id' => 'eng_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrequency()
    {
        //Establishes the relationship. The field of related tabel can be retrieved. e.g: 'frequency.frequency'
        return $this->hasOne(MaintenanceFrequency::className(), ['freq_id' => 'maint_type_id']);
    }
}
