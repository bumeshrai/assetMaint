<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ohe_daily_progress".
 *
 * @property integer $ohe_daily_id
 * @property string $section
 * @property integer $tension_number
 * @property integer $expansion_joint_completed
 * @property integer $marking_completed
 * @property integer $bolt_completed
 * @property integer $bracket_completed
 * @property integer $rail_completed
 * @property integer $contact_wire_completed
 * @property integer $aec_erection_completed
 * @property integer $aec_clamping_completed
 * @property integer $bec_laying_completed
 * @property integer $met_fixing_completed
 * @property integer $bracket_adjustment
 * @property integer $stagger_adjustment
 * @property double $manhours_factor
 * @property string $date_worked
 */
class OheDailyProgress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ohe_daily_progress';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['section', 'tension_number', 'date_worked'], 'required'],
            [['tension_number', 'expansion_joint_completed', 'marking_completed', 'bolt_completed', 'bracket_completed', 'rail_completed', 'contact_wire_completed', 'aec_erection_completed', 'aec_clamping_completed', 'bec_laying_completed', 'met_fixing_completed', 'bracket_adjustment', 'stagger_adjustment'], 'integer'],
            [['manhours_factor'], 'number'],
            [['date_worked'], 'safe'],
            [['section'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ohe_daily_id' => 'Ohe Daily ID',
            'section' => 'Section',
            'tension_number' => 'Tension Number',
            'expansion_joint_completed' => 'Expansion Joint Completed',
            'marking_completed' => 'Marking Completed',
            'bolt_completed' => 'Bolt Completed',
            'bracket_completed' => 'Bracket Completed',
            'rail_completed' => 'Rail Completed',
            'contact_wire_completed' => 'Contact Wire Completed',
            'aec_erection_completed' => 'Aec Erection Completed',
            'aec_clamping_completed' => 'Aec Clamping Completed',
            'bec_laying_completed' => 'Bec Laying Completed',
            'met_fixing_completed' => 'Met Fixing Completed',
            'bracket_adjustment' => 'Bracket Adjustment',
            'stagger_adjustment' => 'Stagger Adjustment',
            'manhours_factor' => 'Manhours Factor',
            'date_worked' => 'Date Worked',
        ];
    }
}
