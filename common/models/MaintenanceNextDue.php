<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "maintenance_next_due".
 *
 * @property integer $id
 * @property string $asset_code
 * @property string $controller
 * @property string $maint_daily
 * @property string $maint_weekly
 * @property string $maint_fortnightly
 * @property string $maint_monthly
 * @property string $maint_quaterly
 * @property string $maint_biannual
 * @property string $maint_annual
 * @property string $maint_biennial
 * @property string $maint_triennial
 */
class MaintenanceNextDue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maintenance_next_due';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['asset_code', 'controller'], 'required'],
            [['maint_daily', 'maint_weekly', 'maint_fortnightly', 'maint_monthly', 'maint_quaterly', 'maint_biannual', 'maint_annual', 'maint_biennial', 'maint_triennial'], 'safe'],
            [['maint_daily', 'maint_weekly', 'maint_fortnightly', 'maint_monthly', 'maint_quaterly', 'maint_biannual', 'maint_annual', 'maint_biennial', 'maint_triennial'], 'default', 'value' => '3099-12-12'],
            [['asset_code'], 'string', 'max' => 20],
            [['controller'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'asset_code' => 'Asset Code',
            'controller' => 'Equipment Class',
            'maint_daily' => 'Daily Maintenance Due on date (leave blank if not needed)',
            'maint_weekly' => 'Weekly Maintenance Due on date (leave blank if not needed)',
            'maint_fortnightly' => 'Fortnightly Maintenance Due on date (leave blank if not needed)',
            'maint_monthly' => 'Monthly Maintenance Due on date (leave blank if not needed)',
            'maint_quaterly' => 'Quaterly Maintenance Due on date (leave blank if not needed)',
            'maint_biannual' => 'Half-Yearly Maintenance Due on date (leave blank if not needed)',
            'maint_annual' => 'Annual Maintenance Due on date (leave blank if not needed)',
            'maint_biennial' => 'Biennial  Maintenance Due on date (leave blank if not needed)',
            'maint_triennial' => 'Triennial  Maintenance Due on date (leave blank if not needed)',
        ];
    }
}
