<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PowerReading;

/**
 * PowerReadingSearch represents the model behind the search form about `common\models\PowerReading`.
 */
class PowerReadingSearch extends PowerReading
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reading_id', 'active_power', 'total_power', 'solar_generation', 'maximum_demand'], 'integer'],
            [['date_on', 'receiving_station', 'supply'], 'safe'],
            [['power_factor'], 'number'],
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
        $query = PowerReading::find();

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
            'reading_id' => $this->reading_id,
            'date_on' => $this->date_on,
            'active_power' => $this->active_power,
            'total_power' => $this->total_power,
            'solar_generation' => $this->solar_generation,
            'maximum_demand' => $this->maximum_demand,
            'power_factor' => $this->power_factor,
        ]);

        $query->andFilterWhere(['like', 'receiving_station', $this->receiving_station])
            ->andFilterWhere(['like', 'supply', $this->supply]);

        return $dataProvider;
    }
}
