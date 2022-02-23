<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TunnelVentilationDamper;

/**
 * TunnelVentilationDamperSearch represents the model behind the search form about `common\models\TunnelVentilationDamper`.
 */
class TunnelVentilationDamperSearch extends TunnelVentilationDamper
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tvd_id', 'freq_id', 'actuator_cam_check', 'blades_cleaned', 'linkages_check', 'manual_close_open_check', 'frame_nuts_tightness_check', 'actuator_wiring_ok', 'blades_open_alignment_ok', 'blades_close_alignment_ok', 'limit_switch_signal_check', 'physical_inspection', 'maint_type_id', 'eng_id', 'contractor'], 'integer'],
            [['actuator_cam_setting', 'linkage_moving_smooth', 'actuator_spring_tightness', 'frame_corroded', 'close_open_sound', 'description', 'asset_code', 'created_at', 'updated_at'], 'safe'],
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
        $query = TunnelVentilationDamper::find();

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
            'tvd_id' => $this->tvd_id,
            'freq_id' => $this->freq_id,
            'actuator_cam_check' => $this->actuator_cam_check,
            'blades_cleaned' => $this->blades_cleaned,
            'linkages_check' => $this->linkages_check,
            'manual_close_open_check' => $this->manual_close_open_check,
            'frame_nuts_tightness_check' => $this->frame_nuts_tightness_check,
            'actuator_wiring_ok' => $this->actuator_wiring_ok,
            'blades_open_alignment_ok' => $this->blades_open_alignment_ok,
            'blades_close_alignment_ok' => $this->blades_close_alignment_ok,
            'limit_switch_signal_check' => $this->limit_switch_signal_check,
            'physical_inspection' => $this->physical_inspection,
            'maint_type_id' => $this->maint_type_id,
            'eng_id' => $this->eng_id,
            'contractor' => $this->contractor,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'actuator_cam_setting', $this->actuator_cam_setting])
            ->andFilterWhere(['like', 'linkage_moving_smooth', $this->linkage_moving_smooth])
            ->andFilterWhere(['like', 'actuator_spring_tightness', $this->actuator_spring_tightness])
            ->andFilterWhere(['like', 'frame_corroded', $this->frame_corroded])
            ->andFilterWhere(['like', 'close_open_sound', $this->close_open_sound])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'asset_code', $this->asset_code]);

        return $dataProvider;
    }
}
