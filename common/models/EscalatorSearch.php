<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Escalator;

/**
 * EscalatorSearch represents the model behind the search form about `common\models\Escalator`.
 */
class EscalatorSearch extends Escalator
{
    
    public $eng;
    public $frequency;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['escl_id', 'freq_id', 'clean_component_list', 'lubricate_chains', 'grease_shaft_bushes', 'quaterly_visual_check', 'halfyearly_visual_check', 'annual_visual_check', 'monthly_step_inspection', 'quaterly_step_inspection', 'halfyearly_step_inspection', 'annual_step_inspection', 'monthly_step_chain_inspection', 'halfyearly_step_chain_inspection', 'annual_step_chain_inspection', 'monthly_comb_inspection', 'annual_comb_inspection', 'handrail_inspection', 'drive_chain_inspection', 'monthly_machinery_inspection', 'halfyearly_machinery_inspection', 'annual_machinery_inspection', 'monthly_brake_inspection', 'halfyearly_brake_inspection', 'monthly_safety_function', 'halfyearly_safety_function', 'monthly_operative_function', 'halfyearly_operative_function', 'annual_operative_function', 'maint_type_id', 'eng_id', 'contractor'], 'integer'],
            [['description', 'asset_code', 'created_at', 'updated_at'], 'safe'],
            [['eng', 'frequency', ], 'safe'],
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
        $query = Escalator::find();

        // extra for querying the relations
        $query->joinWith(['eng']);
        $query->joinWith(['frequency']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // extra for querying the relations
        $dataProvider->sort->attributes['eng'] = [
            // The tables are the ones our relation are configured to
            'asc' => ['user.username' => SORT_ASC],
            'desc' => ['user.username' => SORT_DESC],
        ];
        
        $dataProvider->sort->attributes['frequency'] = [
            // The tables are the ones our relation are configured to
            'asc' => ['maintenance_frequency.frequency' => SORT_ASC],
            'desc' => ['maintenance_frequency.frequency' => SORT_DESC],
        ];
        

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'asset_code', $this->asset_code])
            ->andFilterWhere(['like', 'user.username', $this->eng])
            ->andFilterWhere(['like', 'maintenance_frequency.frequency', $this->frequency])
            ->andFilterWhere(['like', 'contractor', $this->contractor])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
