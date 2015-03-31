<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\division as divisionModel;

/**
 * division represents the model behind the search form about `common\models\division`.
 */
class division extends divisionModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'sort', 'created_at', 'updated_at', 'creator_id', 'updator_id', 'season_id', 'competition_id', 'is_modered', 'is_closed', 'is_bid'], 'integer'],
            [['start_year', 'end_year', 'name'], 'safe'],
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
        $query = divisionModel::find();

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
            'is_modered' => $this->is_modered,
            'is_closed' => $this->is_closed,
            'is_bid' => $this->is_bid,
        ]);

        $query->andFilterWhere(['like', 'start_year', $this->start_year])
            ->andFilterWhere(['like', 'end_year', $this->end_year])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
