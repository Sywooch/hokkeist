<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\competition as competitionModel;

/**
 * competition represents the model behind the search form about `common\models\competition`.
 */
class competition extends competitionModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'sort','creator_id', 'updator_id', 'season_id', 'is_now', 'is_request_now', 'transition_type', 'is_modered', 'is_closed', 'for_import'], 'integer'],
            [['name', 'fullname', 'hashtag', 'created_at', 'updated_at'], 'safe'],
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
        $query = competitionModel::find();

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
            
            'FROM_UNIXTIME(created_at,"%d.%m.%Y")' => $this->created_at,
            'FROM_UNIXTIME(updated_at,"%d.%m.%Y")' => $this->updated_at,
            
            
            'creator_id' => $this->creator_id,
            'updator_id' => $this->updator_id,
            'season_id' => $this->season_id,
            'is_now' => $this->is_now,
            'is_request_now' => $this->is_request_now,
            'transition_type' => $this->transition_type,
            'is_modered' => $this->is_modered,
            'is_closed' => $this->is_closed,
            'for_import' => $this->for_import,
        ]);
        
//        die( $this->created_at);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'hashtag', $this->hashtag]);

        return $dataProvider;
    }
}
