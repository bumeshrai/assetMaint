<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Breakdown;

/**
 * BreakdownSearch represents the model behind the search form about `common\models\Breakdown`.
 */
class BreakdownSearch extends Breakdown
{
    public $repairTime;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bd_id', 'dept_id', 'attended', 'classify_BD', 'resp_contractor', 'reporting_time', 
                'repaired_time'], 'integer'],
            [['asset_code', 'reported_by', 'attended_by', 'bd_description', 'repair_description'], 'safe'],
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
        $query = Breakdown::find();

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
            'bd_id' => $this->bd_id,
            'attended' => $this->attended,
            'classify_BD' => $this->classify_BD,
            'resp_contractor' => $this->resp_contractor, 
            'reporting_time' => $this->reporting_time,
            'repaired_time' => $this->repaired_time,
            'asset_code' => $this->asset_code,
            'reported_by' => $this->reported_by,
            'attended_by' => $this->attended_by,
            'bd_description' => $this->bd_description,
            'repair_description' => $this->repair_description,
            'dept_id' => $this->dept_id,
        ]);

        return $dataProvider;
    }
}
