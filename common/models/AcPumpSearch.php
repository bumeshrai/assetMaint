<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AcPump;

/**
 * AcPumpSearch represents the model behind the search form about `common\models\AcPump`.
 */
class AcPumpSearch extends AcPump
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ac_pump_id', 'freq_id', 'monthly_cleaning', 'quarterly_cleaning', 'quarterly_leak_testing', 'quarterly_record_the_reading', 'monthly_sensible_check', 'quarterly_sensible_check', 'quarterly_lubrication_check', 'monthly_electrical_check', 'halfyearly_electrical_check', 'quarterly_mechanical_check', 'maint_type_id', 'eng_id'], 'integer'],
            [['description', 'asset_code', 'contractor', 'created_at', 'updated_at'], 'safe'],
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
        $query = AcPump::find();

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
            'ac_pump_id' => $this->ac_pump_id,
            'freq_id' => $this->freq_id,
            'monthly_cleaning' => $this->monthly_cleaning,
            'quarterly_cleaning' => $this->quarterly_cleaning,
            'quarterly_leak_testing' => $this->quarterly_leak_testing,
            'quarterly_record_the_reading' => $this->quarterly_record_the_reading,
            'monthly_sensible_check' => $this->monthly_sensible_check,
            'quarterly_sensible_check' => $this->quarterly_sensible_check,
            'quarterly_lubrication_check' => $this->quarterly_lubrication_check,
            'monthly_electrical_check' => $this->monthly_electrical_check,
            'halfyearly_electrical_check' => $this->halfyearly_electrical_check,
            'quarterly_mechanical_check' => $this->quarterly_mechanical_check,
            'maint_type_id' => $this->maint_type_id,
            'eng_id' => $this->eng_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'asset_code', $this->asset_code])
            ->andFilterWhere(['like', 'contractor', $this->contractor]);

        return $dataProvider;
    }
}
