<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StationEarning;

/**
 * StationEarningSearch represents the model behind the search form about `common\models\StationEarning`.
 */
class StationEarningSearch extends StationEarning
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['earning_id', 'stn_id', 'cash', 'card', 'voucher', 'web', 'non_fare'], 'integer'],
            [['date_on'], 'safe'],
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
        $query = StationEarning::find();

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
            'earning_id' => $this->earning_id,
            'date_on' => $this->date_on,
            'stn_id' => $this->stn_id,
            'cash' => $this->cash,
            'card' => $this->card,
            'voucher' => $this->voucher,
            'web' => $this->web,
            'non_fare' => $this->non_fare,
        ]);

        return $dataProvider;
    }
}
