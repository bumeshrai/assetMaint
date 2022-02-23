<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EquipmentName;

/**
 * EquipmentNameSearch represents the model behind the search form about `common\models\EquipmentName`.
 */
class EquipmentNameSearch extends EquipmentName
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ename_id', 'maint_daily', 'maint_weekly', 'maint_fortnightly', 'maint_monthly', 'maint_quaterly', 'maint_biannual', 'maint_annual', 'maint_biennial', 'maint_triennial'], 'integer'],
            [['ename_name'], 'safe'],
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
        $query = EquipmentName::find();

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
            'ename_id' => $this->ename_id,
            'maint_daily' => $this->maint_daily,
            'maint_weekly' => $this->maint_weekly,
            'maint_fortnightly' => $this->maint_fortnightly,
            'maint_monthly' => $this->maint_monthly,
            'maint_quaterly' => $this->maint_quaterly,
            'maint_biannual' => $this->maint_biannual,
            'maint_annual' => $this->maint_annual,
            'maint_biennial' => $this->maint_biennial,
            'maint_triennial' => $this->maint_triennial,
        ]);

        $query->andFilterWhere(['like', 'ename_name', $this->ename_name]);

        return $dataProvider;
    }
}
