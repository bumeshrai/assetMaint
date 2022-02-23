<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\OheProgress;

/**
 * OheProgresSearch represents the model behind the search form about `common\models\OheProgress`.
 */
class OheProgresSearch extends OheProgress
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ohe_id', 'tension_number', 'tension_length', 'expansion_joint_total', 'expansion_joint_completed', 'marking_total', 'marking_completed', 'bolt_total', 'bolt_completed', 'bracket_total', 'bracket_completed', 'rail_total', 'rail_completed', 'contact_wire_total', 'contact_wire_completed', 'aec_erection_total', 'aec_erection_completed', 'aec_clamping_total', 'aec_clamping_completed', 'bec_laying_total', 'bec_laying_completed', 'work_completed'], 'integer'],
            [['section', 'direction', 'date_to_finish', 'date_finished'], 'safe'],
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
        $query = OheProgress::find();

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
            'ohe_id' => $this->ohe_id,
            'tension_number' => $this->tension_number,
            'tension_length' => $this->tension_length,
            'expansion_joint_total' => $this->expansion_joint_total,
            'expansion_joint_completed' => $this->expansion_joint_completed,
            'marking_total' => $this->marking_total,
            'marking_completed' => $this->marking_completed,
            'bolt_total' => $this->bolt_total,
            'bolt_completed' => $this->bolt_completed,
            'bracket_total' => $this->bracket_total,
            'bracket_completed' => $this->bracket_completed,
            'rail_total' => $this->rail_total,
            'rail_completed' => $this->rail_completed,
            'contact_wire_total' => $this->contact_wire_total,
            'contact_wire_completed' => $this->contact_wire_completed,
            'aec_erection_total' => $this->aec_erection_total,
            'aec_erection_completed' => $this->aec_erection_completed,
            'aec_clamping_total' => $this->aec_clamping_total,
            'aec_clamping_completed' => $this->aec_clamping_completed,
            'bec_laying_total' => $this->bec_laying_total,
            'bec_laying_completed' => $this->bec_laying_completed,
            'work_completed' => $this->work_completed,
            'date_to_finish' => $this->date_to_finish,
            'date_finished' => $this->date_finished,
        ]);

        $query->andFilterWhere(['like', 'section', $this->section])
            ->andFilterWhere(['like', 'direction', $this->direction]);

        return $dataProvider;
    }
}
