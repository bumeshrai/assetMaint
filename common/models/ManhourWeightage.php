<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "manhour_weightage".
 *
 * @property integer $manhour_weightage_id
 * @property double $expansion_joint_completed
 * @property double $marking_completed
 * @property double $bolt_completed
 * @property double $bracket_completed
 * @property double $rail_completed
 * @property double $contact_wire_completed
 * @property double $aec_erection_completed
 * @property double $aec_clamping_completed
 * @property double $bec_laying_completed
 * @property double $met_fixing_completed
 * @property double $bracket_adjustment
 * @property double $stagger_adjustment
 */
class ManhourWeightage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'manhour_weightage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['expansion_joint_completed', 'marking_completed', 'bolt_completed', 'bracket_completed', 'rail_completed', 'contact_wire_completed', 'aec_erection_completed', 'aec_clamping_completed', 'bec_laying_completed', 'met_fixing_completed', 'bracket_adjustment', 'stagger_adjustment'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'manhour_weightage_id' => 'Manhour Weightage ID',
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
        ];
    }
}
