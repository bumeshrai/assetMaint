<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Breakdown;

/**
 * BdreportSearch represents the model behind the search form about `common\models\Breakdown`.
 */
class BdreportSearch extends Breakdown
{
    public $repairTime;
    public $stationName;
    public $equipmentName;
    public $levelName;
    public $deptName;
    public $totalFailure;
    public $equipment;
    public $fromdate;
    public $todate;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bd_id', 'dept_id', 'attended', 'classify_BD', 'resp_contractor',
                'repaired_time'], 'integer'],
            [['reporting_time','fromdate','todate','deptName',
            'equipment','asset_code', 'reported_by', 'attended_by', 'bd_description',
            'repair_description','stationName','equipmentName','levelName',], 'safe'],
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
        $query->joinWith(['stationName']);
        $query->joinWith(['equipmentName']);
        $query->joinWith(['levelName']);
        $query->joinWith(['equipment']);
        $query->joinWith(['deptName']);
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

        // grid and search filtering conditions

        $query
           ->andFilterWhere(['like', 'station_code.station_code', $this->stationName])
           ->andFilterWhere(['like', 'equipment_name.ename_name', $this->equipmentName])
           ->andFilterWhere(['like', 'level.level_name', $this->levelName])
            ->andFilterWhere(['like', 'department.dept_name', $this->deptName])
           ->andFilterWhere(['like', 'equipment.asset_code', $this->equipment]);

        if($this->fromdate && $this->todate)
        {
          $from= $this->fromdate;
          $fdate=strtotime($from);
          $to=$this->todate;
          $tdate=strtotime($to);
          $query->andFilterWhere(['between', 'reporting_time', $fdate, $tdate]);
        }
      return $dataProvider;
    }
}
