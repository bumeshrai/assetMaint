<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tunnel_ventilation_damper".
 *
 * @property integer $tvd_id
 * @property integer $freq_id
 * @property integer $actuator_cam_check
 * @property string $actuator_cam_setting
 * @property integer $blades_cleaned
 * @property integer $linkages_check
 * @property string $linkage_moving_smooth
 * @property integer $manual_close_open_check
 * @property string $actuator_spring_tightness
 * @property integer $frame_nuts_tightness_check
 * @property string $frame_corroded
 * @property integer $actuator_wiring_ok
 * @property integer $blades_open_alignment_ok
 * @property integer $blades_close_alignment_ok
 * @property string $close_open_sound
 * @property integer $limit_switch_signal_check
 * @property integer $physical_inspection
 * @property string $description
 * @property string $asset_code
 * @property integer $maint_type_id
 * @property integer $eng_id
 * @property string $contractor
 * @property string $created_at
 * @property string $updated_at
 */
class TunnelVentilationDamper extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tunnel_ventilation_damper';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['freq_id'], 'required'],
            [['freq_id', 'actuator_cam_check', 'blades_cleaned', 'linkages_check', 'manual_close_open_check', 'frame_nuts_tightness_check', 'actuator_wiring_ok', 'blades_open_alignment_ok', 'blades_close_alignment_ok', 'limit_switch_signal_check', 'physical_inspection', 'maint_type_id', 'eng_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['actuator_cam_setting', 'linkage_moving_smooth', 'actuator_spring_tightness', 'frame_corroded', 'close_open_sound'], 'string', 'max' => 25],
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
            'tvd_id' => 'Tvd ID',
            'freq_id' => 'Maintenance Frequency ID',
            'actuator_cam_check' => 'Actuator Cam Check',
            'actuator_cam_setting' => 'Actuator Cam Setting',
            'blades_cleaned' => 'Blades Cleaned',
            'linkages_check' => 'Linkages Check',
            'linkage_moving_smooth' => 'Linkage Moving Smooth',
            'manual_close_open_check' => 'Manual Close Open Check',
            'actuator_spring_tightness' => 'Actuator Spring Tightness',
            'frame_nuts_tightness_check' => 'Frame Nuts Tightness Check',
            'frame_corroded' => 'Frame Corroded',
            'actuator_wiring_ok' => 'Actuator Wiring Ok',
            'blades_open_alignment_ok' => 'Blades Open Alignment Ok',
            'blades_close_alignment_ok' => 'Blades Close Alignment Ok',
            'close_open_sound' => 'Close Open Sound',
            'limit_switch_signal_check' => 'Limit Switch Signal Check',
            'physical_inspection' => 'Physical Inspection',
            'description' => 'Description',
            'asset_code' => 'Asset Code',
            'maint_type_id' => 'Maint Type ID',
            'eng_id' => 'Eng ID',
            'contractor' => 'Contractor',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
