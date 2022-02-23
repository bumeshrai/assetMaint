<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Manufacturer;

/**
 * ManufacturerSearch represents the model behind the search form about `common\models\Manufacturer`.
 */
class ManufacturerSearch extends Manufacturer
{
    
    public $equipment_name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['manuf_id', 'ename_id'], 'integer'],
            [['equipment_name', 'name', 'country', 'contact_person', 'contact_phone', 'contact_email'], 'safe'],
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
        $query = Manufacturer::find();

        // extra for querying the relations
        $query->joinWith(['equipment_name']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // extra for querying the relations
        $dataProvider->sort->attributes['equipment_name'] = [
            // The tables are the ones our relation are configured to
            'asc' => ['equipment_name.ename_name' => SORT_ASC],
            'desc' => ['equipment_name.ename_name' => SORT_DESC],
        ];


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'manuf_id' => $this->manuf_id,
            'ename_id' => $this->ename_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'contact_person', $this->contact_person])
            ->andFilterWhere(['like', 'contact_phone', $this->contact_phone])
            ->andFilterWhere(['like', 'contact_email', $this->contact_email])
            ->andFilterWhere(['like', 'equipment_name.ename_name', $this->equipment_name]);

        return $dataProvider;
    }
}
