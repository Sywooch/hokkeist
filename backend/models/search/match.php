<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Match as matchModel;

/**
 * match represents the model behind the search form about `common\models\Match`.
 */
class match extends matchModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'sort', 'created_at', 'updated_at', 'creator_id', 'updator_id', 'number', 'team_1', 'team_2', 'stadium_id', 'season_id', 'competition_id', 'division_id', 'stage_id', 'group_id', 'tour_id', 'goal_1', 'goal_2', 'points_1', 'points_2'], 'integer'],
            [['day', 'time', 'result'], 'safe'],
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
        $query = Match::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'sort' => $this->sort,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'creator_id' => $this->creator_id,
            'updator_id' => $this->updator_id,
            'number' => $this->number,
            'day' => $this->day,
            'time' => $this->time,
            'team_1' => $this->team_1,
            'team_2' => $this->team_2,
            'stadium_id' => $this->stadium_id,
            'season_id' => $this->season_id,
            'competition_id' => $this->competition_id,
            'division_id' => $this->division_id,
            'stage_id' => $this->stage_id,
            'group_id' => $this->group_id,
            'tour_id' => $this->tour_id,
            'goal_1' => $this->goal_1,
            'goal_2' => $this->goal_2,
            'points_1' => $this->points_1,
            'points_2' => $this->points_2,
        ]);

        $query->andFilterWhere(['like', 'result', $this->result]);

        return $dataProvider;
    }
}
