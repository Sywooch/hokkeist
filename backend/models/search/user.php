<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User as modelUser;

/**
 * user represents the model behind the search form about `common\models\User`.
 */
class user extends modelUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status','creator_id','updator_id'], 'integer'],
           
            [['first_name','last_name','username', 'password', 'auth_key', 'accessToken', 'password_hash', 'password_reset_token', 'email', 'created_at', 'updated_at'], 'safe'],
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
        $query = User::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            
            'creator_id' => $this->creator_id,
            
            'FROM_UNIXTIME(created_at,"%d.%m.%Y")' => $this->created_at,
            'FROM_UNIXTIME(updated_at,"%d.%m.%Y")' => $this->updated_at,
        ]);
        

        $query->andFilterWhere(['like', 'username', $this->username])
               
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'accessToken', $this->accessToken])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email]);

        if($this->first_name) {
             $query->andFilterWhere(['like', 'first_name', $this->first_name])
                ->orWhere(['like', 'last_name', $this->first_name]);
        }
        
        $query->with(['creator']);
        
        return $dataProvider;
    }
}
