<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tunnel_ventilation_fan".
 *
 * @property integer $tvf_id
 * @property integer $freq_id
 * @property integer $check_impeller_blade
 * @property integer $check_impeller_wing_root
 * @property string $impeller_blade_condition
 * @property integer $clean_motor_casing
 * @property integer $lubricate_motor
 * @property integer $electrical_insulation
 * @property integer $electrical_terminal
 * @property integer $check_manual_operation
 * @property integer $check_emergency_stop
 * @property integer $check_flexible_connector
 * @property integer $vibration_isolater_level
 * @property integer $physical_inspection
 * @property string $noise_level_in_db
 * @property string $fan_vibration_reading
 * @property string $blade_tip_clearance_reading
 * @property string $description
 * @property string $asset_code
 * @property integer $maint_type_id
 * @property integer $eng_id
 * @property string $contractor
 * @property string $created_at
 */
class TunnelVentilationFan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tunnel_ventilation_fan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['freq_id'], 'required'],
            [['freq_id', 'check_impeller_blade', 'check_impeller_wing_root', 'clean_motor_casing', 'lubricate_motor', 'electrical_insulation', 'electrical_terminal', 'check_manual_operation', 'check_emergency_stop', 'check_flexible_connector', 'vibration_isolater_level', 'physical_inspection', 'maint_type_id', 'eng_id'], 'integer'],
            [['created_at'], 'safe'],
            [['impeller_blade_condition', 'noise_level_in_db', 'fan_vibration_reading', 'blade_tip_clearance_reading'], 'string', 'max' => 25],
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
            'tvf_id' => 'Tvf ID',
            'freq_id' => 'Freq ID',
            'check_impeller_blade' => 'Clean the Impeller and Blade',
            'check_impeller_wing_root' => 'Check Impeller Wing Root',
            'impeller_blade_condition' => 'Impeller Blade Condition',
            'clean_motor_casing' => 'Clean Motor Casing',
            'lubricate_motor' => 'Lubricate Motor',
            'electrical_insulation' => 'Electrical Insulation',
            'electrical_terminal' => 'Electrical Terminal of Fan and Motor Check',
            'check_manual_operation' => 'Check Manual Operation',
            'check_emergency_stop' => 'Check Emergency Stop',
            'check_flexible_connector' => 'Check Flexible Connector',
            'vibration_isolater_level' => 'Vibration Isolater Level',
            'physical_inspection' => 'Physical Inspection',
            'noise_level_in_db' => 'Noise Level In Db',
            'fan_vibration_reading' => 'Fan Vibration Reading',
            'blade_tip_clearance_reading' => 'Blade Tip Clearance Reading',
            'description' => 'Description',
            'asset_code' => 'Asset Code',
            'maint_type_id' => 'Maint Type ID',
            'eng_id' => 'Eng ID',
            'contractor' => 'Contractor',
            'created_at' => 'Created At',
        ];
    }
}
