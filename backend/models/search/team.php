<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Team as teamModel;

/**
 * team represents the model behind the search form about `common\models\team`.
 */
class team extends teamModel {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'status', 'sort', 'creator_id', 'updator_id', 'city_id','organization_id'], 'integer'],
            [['created_at', 'updated_at', 'name', 'abbr', 'phone', 'email', 'site', 'site_nhl', 'description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        if (empty($this->status))
            $query = teamModel::find();
        else
            $query = teamModel::findAnyWhere();

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
            'city_id' => $this->city_id,
            'organization_id' => $this->organization_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'abbr', $this->abbr])
                ->andFilterWhere(['like', 'phone', $this->phone])
                ->andFilterWhere(['like', 'email', $this->email])
                ->andFilterWhere(['like', 'site', $this->site])
                ->andFilterWhere(['like', 'site_nhl', $this->site_nhl])
                ->andFilterWhere(['like', 'description', $this->description]);

        $query->with(['city','organization']);
        return $dataProvider;
    }

}
