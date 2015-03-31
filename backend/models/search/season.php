<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Season as seasonModel;

/**
 * season represents the model behind the search form about `common\models\season`.
 */
class season extends seasonModel {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'sort', 'status', 'creator_id', 'updator_id'], 'integer'],
            [['name', 'created_at', 'updated_at'], 'safe'],
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
        $query = seasonModel::find();

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
            'sort' => $this->sort,
            'status' => $this->status,
            'creator_id' => $this->creator_id,
            'updator_id' => $this->updator_id,
            
            'FROM_UNIXTIME(created_at,"%d.%m.%Y")' => $this->created_at,
            'FROM_UNIXTIME(updated_at,"%d.%m.%Y")' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

//        $query->andFilterWhere(['like', 'updated_at', date('Y-m-d',strtotime($this->updated_at))]);

        return $dataProvider;
    }

}
