<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ohe_progress".
 *
 * @property integer $ohe_id
 * @property string $section
 * @property string $direction
 * @property integer $tension_number
 * @property integer $tension_length
 * @property integer $expansion_joint_total
 * @property integer $expansion_joint_completed
 * @property integer $marking_total
 * @property integer $marking_completed
 * @property integer $bolt_total
 * @property integer $bolt_completed
 * @property integer $bracket_total
 * @property integer $bracket_completed
 * @property integer $rail_total
 * @property integer $rail_completed
 * @property integer $contact_wire_total
 * @property integer $contact_wire_completed
 * @property integer $aec_erection_total
 * @property integer $aec_erection_completed
 * @property integer $aec_clamping_total
 * @property integer $aec_clamping_completed
 * @property integer $bec_laying_total
 * @property integer $bec_laying_completed
 * @property integer $met_fixing_total 
 * @property integer $met_fixing_completed 
 * @property integer $bracket_adjustment 
 * @property integer $stagger_adjustment 
 * @property integer $work_completed
 * @property integer $under_progress 
 * @property string $date_to_finish
 * @property string $date_finished
 */
class OheProgress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ohe_progress';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['section', 'direction', 'tension_number', 'tension_length', 'expansion_joint_total', 'expansion_joint_completed', 'marking_total', 'marking_completed', 'bolt_total', 'bolt_completed', 'bracket_total', 'bracket_completed', 'rail_total', 'rail_completed', 'contact_wire_total', 'contact_wire_completed', 'aec_erection_total', 'aec_erection_completed', 'aec_clamping_total', 'aec_clamping_completed', 'bec_laying_total', 'bec_laying_completed', 'met_fixing_completed', ], 'required'],
           [['tension_number', 'tension_length', 'expansion_joint_total', 'expansion_joint_completed', 'marking_total', 'marking_completed', 'bolt_total', 'bolt_completed', 'bracket_total', 'bracket_completed', 'rail_total', 'rail_completed', 'contact_wire_total', 'contact_wire_completed', 'aec_erection_total', 'aec_erection_completed', 'aec_clamping_total', 'aec_clamping_completed', 'bec_laying_total', 'bec_laying_completed', 'met_fixing_total', 'met_fixing_completed', 'bracket_adjustment', 'stagger_adjustment', 'work_completed', 'under_progress'], 'integer'],
            [['date_to_finish', 'date_finished'], 'safe'],
            [['section', 'direction'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ohe_id' => 'OHE ID',
            'section' => 'Section',
            'direction' => 'Direction',
            'tension_number' => 'TL Number',
            'tension_length' => 'TL Length',
            'expansion_joint_total' => 'Expansion Joint Total',
            'expansion_joint_completed' => 'Expansion Joint Completed',
            'marking_total' => 'Marking Total',
            'marking_completed' => 'Marking Completed',
            'bolt_total' => 'Bolt Total',
            'bolt_completed' => 'Bolt Completed',
            'bracket_total' => 'Bracket Total',
            'bracket_completed' => 'Bracket Completed',
            'rail_total' => 'Rail Total',
            'rail_completed' => 'Rail Completed',
            'contact_wire_total' => 'Contact Wire Total',
            'contact_wire_completed' => 'Contact Wire Completed',
            'aec_erection_total' => 'AEC Erection Total',
            'aec_erection_completed' => 'AEC Erection Completed',
            'aec_clamping_total' => 'AEC Clamping Total',
            'aec_clamping_completed' => 'AEC Clamping Completed',
            'bec_laying_total' => 'BEC Laying Total',
            'bec_laying_completed' => 'BEC Laying Completed',
            'met_fixing_total' => 'Met Fixing Total',
            'met_fixing_completed' => 'Met Fixing Completed',
            'bracket_adjustment' => 'Bracket Adjustment',
            'stagger_adjustment' => 'Stagger Adjustment',
            'work_completed' => 'Work Completed',
            'under_progress' => 'Under Progress',
            'date_to_finish' => 'Target Date',
            'date_finished' => 'Actual Date Finished',
        ];
    }
}
