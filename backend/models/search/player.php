<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Player as playerModel;

/**
 * player represents the model behind the search form about `common\models\player`.
 */
class player extends playerModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'height', 'pass_serial', 'pass_number', 'city_id', 'sort', 'created_at', 'updated_at', 'creator_id', 'updator_id', 'status', 'team_id'], 'integer'],
            [['firstname', 'lastname', 'middlename', 'birthday', 'grip', 'role', 'death_date', 'birth_place', 'email', 'phone', 'pass_issue_date', 'pass_issued', 'foreign_pass', 'address'], 'safe'],
            [['weight'], 'number'],
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
        $query = playerModel::find();

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
            'birthday' => $this->birthday,
            'height' => $this->height,
            'weight' => $this->weight,
            'death_date' => $this->death_date,
            'pass_serial' => $this->pass_serial,
            'pass_number' => $this->pass_number,
            'pass_issue_date' => $this->pass_issue_date,
            'city_id' => $this->city_id,
            'sort' => $this->sort,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'creator_id' => $this->creator_id,
            'updator_id' => $this->updator_id,
            'status' => $this->status,
            'team_id' => $this->team_id,
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'middlename', $this->middlename])
            ->andFilterWhere(['like', 'grip', $this->grip])
            ->andFilterWhere(['like', 'role', $this->role])
            ->andFilterWhere(['like', 'birth_place', $this->birth_place])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'pass_issued', $this->pass_issued])
            ->andFilterWhere(['like', 'foreign_pass', $this->foreign_pass])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
