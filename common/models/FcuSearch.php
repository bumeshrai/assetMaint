<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Fcu;

/**
 * FcuSearch represents the model behind the search form about `common\models\Fcu`.
 */
class FcuSearch extends Fcu
{
    
    public $eng;
    public $frequency;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fcu_id', 'freq_id', 'weekly_cleaning', 'quarterly_cleaning', 'annually_cleaning', 'quarterly_sensible_check', 'annually_sensible_check', 'quarterly_tightness_check', 'quarterly_electrical_check', 'maint_type_id', 'eng_id'], 'integer'],
            [['description', 'asset_code', 'contractor', 'created_at', 'updated_at'], 'safe'],
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
        $query = Fcu::find();

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
