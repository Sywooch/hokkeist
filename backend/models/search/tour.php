<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\tour as tourModel;

/**
 * tour represents the model behind the search form about `common\models\tour`.
 */
class tour extends tourModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'sort', 'created_at', 'updated_at', 'creator_id', 'updator_id', 'season_id', 'competition_id', 'division_id', 'stage_id', 'tour_number', 'round'], 'integer'],
            [['name'], 'safe'],
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
        $query = tourModel::find();

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
            'stage_id' => $this->stage_id,
            'tour_number' => $this->tour_number,
            'round' => $this->round,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
