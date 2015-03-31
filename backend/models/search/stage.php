<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\stage as stageModel;

/**
 * stage represents the model behind the search form about `common\models\stage`.
 */
class stage extends stageModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'sort', 'created_at', 'updated_at', 'creator_id', 'updator_id', 'season_id', 'competition_id', 'division_id', 'tours_count', 'round_count', 'players_count', 'points_win', 'points_win_overtime', 'points_win_shootouts', 'points_draw', 'points_defeat', 'points_defeat_overtime', 'points_defeat_shootouts'], 'integer'],
            [['name', 'type'], 'safe'],
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
        $query = stageModel::find();

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
            'season_id' => $this->season_id,
            'competition_id' => $this->competition_id,
            'division_id' => $this->division_id,
            'tours_count' => $this->tours_count,
            'round_count' => $this->round_count,
            'players_count' => $this->players_count,
            'points_win' => $this->points_win,
            'points_win_overtime' => $this->points_win_overtime,
            'points_win_shootouts' => $this->points_win_shootouts,
            'points_draw' => $this->points_draw,
            'points_defeat' => $this->points_defeat,
            'points_defeat_overtime' => $this->points_defeat_overtime,
            'points_defeat_shootouts' => $this->points_defeat_shootouts,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
