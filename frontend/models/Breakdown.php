<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "breakdown".
 *
 * @property integer $bd_id
 * @property string $asset_code
 * @property string $reported_by
 * @property integer $attended
 * @property integer $resp_contractor
 * @property integer $classify_BD
 * @property integer $resp_contractor
 * @property integer $reporting_time
 * @property string $attended_by
 * @property integer $repaired_time
 */
class Breakdown extends \yii\db\ActiveRecord
{
    public $corr_id;
    public $stn_id;
    public $ename_id;
    public $enos_id;
    public $level_id;

    // Not occuring as field in table
    public $MONTH;
    public $DATE;
    public $FAIL;
    public $REPAIR;

    //  Not occuring as field in table and used in view
    public $period;
    public $start_date;
    public $end_date;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'breakdown';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['corr_id',  'ename_id', 'enos_id', 'level_id'], 'required'],
            [['enos_id'], 'integer', 'min' => 1, 'max'=>9999, ],
            // Declare safe to get posted values from view to controller
            [['asset_code', 'attended_by', 'attended', 'classify_BD'], 'safe'],
            [['reporting_time', 'resp_contractor', 'reporting_time', 'repaired_time', 'repair_description'], 'safe'],
            [['bd_description', 'repair_description'], 'string'],
            [['asset_code'], 'string', 'max' => 20],
            [['reported_by', 'attended_by'], 'string', 'max' => 255],
            [['corr_id', 'stn_id', 'ename_id', 'enos_id', 'level_id',],'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bd_id' => 'Bd ID',
            'asset_code' => 'Asset Code',
            'reported_by' => 'Reported By (Name & Designation)',
            'attended' => 'Attended',
            'classify_BD' => 'Classify as Breakdown',
            'resp_contractor' => 'Contractor Responsible', 
            'reporting_time' => 'Reporting Time',
            'attended_by' => 'Attended By',
            'repaired_time' => 'Repaired Time',
            'bd_description' => 'Brief Breakdown Description',
            'repair_description' => 'Repair Description',
            'repairTime' => 'Repair Time Taken',
            'corr_id' => 'Select Corridor',
            'stn_id' =>  'Select Station Name',
            'ename_id' => 'Select Equipment',
            'enos_id' => 'Enter Equipment Number',
            'level_id' => 'Location of Equipment',
        ];
    }

    /* Getter for calculated */
    public function getRepairTime() {
        if ($this->repaired_time != NULL)
            return  date('H:i:s', mktime(0, 0, $this->repaired_time -  $this->reporting_time));
        else
            return  date('H:i:s', mktime(0, 0, time() - $this->reporting_time));

    }
}
