<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StationCode;

/**
 * StationCodeSearch represents the model behind the search form about `common\models\StationCode`.
 */
class StationCodeSearch extends StationCode
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stn_id', 'corr_id'], 'integer'],
            [['station_name', 'station_code'], 'safe'],
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
        $query = StationCode::find();

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
            'stn_id' => $this->stn_id,
            'corr_id' => $this->corr_id,
        ]);

        $query->andFilterWhere(['like', 'station_name', $this->station_name])
            ->andFilterWhere(['like', 'station_code', $this->station_code]);

        return $dataProvider;
    }
}
