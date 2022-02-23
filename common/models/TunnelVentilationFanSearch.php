<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TunnelVentilationFan;

/**
 * TunnelVentilationFanSearch represents the model behind the search form about `common\models\TunnelVentilationFan`.
 */
class TunnelVentilationFanSearch extends TunnelVentilationFan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tvf_id', 'freq_id', 'check_impeller_blade', 'check_impeller_wing_root', 'clean_motor_casing', 'lubricate_motor', 'electrical_insulation', 'electrical_terminal', 'check_manual_operation', 'check_emergency_stop', 'check_flexible_connector', 'vibration_isolater_level', 'physical_inspection', 'maint_type_id', 'eng_id', 'contractor'], 'integer'],
            [['impeller_blade_condition', 'noise_level_in_db', 'fan_vibration_reading', 'blade_tip_clearance_reading', 'description', 'asset_code', 'created_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TunnelVentilationFan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'tvf_id' => $this->tvf_id,
            'freq_id' => $this->freq_id,
            'check_impeller_blade' => $this->check_impeller_blade,
            'check_impeller_wing_root' => $this->check_impeller_wing_root,
            'clean_motor_casing' => $this->clean_motor_casing,
            'lubricate_motor' => $this->lubricate_motor,
            'electrical_insulation' => $this->electrical_insulation,
            'electrical_terminal' => $this->electrical_terminal,
            'check_manual_operation' => $this->check_manual_operation,
            'check_emergency_stop' => $this->check_emergency_stop,
            'check_flexible_connector' => $this->check_flexible_connector,
            'vibration_isolater_level' => $this->vibration_isolater_level,
            'physical_inspection' => $this->physical_inspection,
            'maint_type_id' => $this->maint_type_id,
            'eng_id' => $this->eng_id,
            'contractor' => $this->contractor,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'impeller_blade_condition', $this->impeller_blade_condition])
            ->andFilterWhere(['like', 'noise_level_in_db', $this->noise_level_in_db])
            ->andFilterWhere(['like', 'fan_vibration_reading', $this->fan_vibration_reading])
            ->andFilterWhere(['like', 'blade_tip_clearance_reading', $this->blade_tip_clearance_reading])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'asset_code', $this->asset_code]);

        return $dataProvider;
    }
}
