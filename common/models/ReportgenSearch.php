<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Equipment;

/**
 * EquipmentSearch represents the model behind the search form about `common\models\Equipment`.
 */
class ReportgenSearch extends Equipment
{

    public $equipment_name;
    public $station_name;
    public $located_at;
    public $totalFailure;
    public $fromdate;
    public $todate;
    public $bdassetcode;
    public $deptName;
    public $breakdown;  



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attended','equip_id', 'corr_id', 'ename_id', 'manuf_id', 'enos_id', 'level_id', 'stn_id', 'installation_date', 'asset_code', 'last_major_overhaul', 'last_minor_maintenance'], 'integer'],
            [['fromdate','todate','deptName','bdassetcode','totalFailure','equipment_name', 'station_name', 'located_at',], 'safe'],
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
        $query = Equipment::find();

        // extra for querying the relations
        $query->joinWith(['equipment_name']);
        $query->joinWith(['station_name']);
        $query->joinWith(['located_at']);
        $query->joinWith(['deptName']);
        $query->joinWith(['breakdown' => function ($q) {
            $q->where('breakdown.reporting_time ');
     }]);
    /// $query->joinWith(['breakdown' => function ($q) {
    //     $q->where('breakdown.asset_code');
  //}]);

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

        $dataProvider->sort->attributes['station_name'] = [
            // The tables are the ones our relation are configured to
            'asc' => ['station_code.station_code' => SORT_ASC],
            'desc' => ['station_code.station_code' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['located_at'] = [
            // The tables are the ones our relation are configured to
            'asc' => ['level.level_name' => SORT_ASC],
            'desc' => ['level.level_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
          //  'equip_id' => $this->equip_id,
          //  'corr_id' => $this->corr_id,
          //  'ename_id' => $this->ename_id,
          //  'manuf_id' => $this->manuf_id,
          //  'enos_id' => $this->enos_id,
          //  'level_id' => $this->level_id,
        //    'stn_id' => $this->stn_id,
          //  'asset_code' => $this->asset_code,

        ])
        ->andFilterWhere(['like', 'equipment_name.ename_name', $this->equipment_name])
        ->andFilterWhere(['like', 'station_code.station_code', $this->station_name])
        ->andFilterWhere(['like', 'department.dept_name', $this->deptName])
        //->andFilterWhere(['like', 'level.level_name', $this->located_at]);

        ->andFilterWhere(['like', 'breakdown.asset_code', $this->bdassetcode]);
        if($this->fromdate && $this->todate){
          $from= $this->fromdate;
          $fdate=strtotime($from);
          $to=$this->todate;
          $tdate=strtotime($to);

    $query->andFilterwhere(['between','breakdown.reporting_time' , $fdate, $tdate]);
}

        return $dataProvider;
    }
}
