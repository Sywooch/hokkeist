<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Article;

/**
 * article represents the model behind the search form about `common\models\Article`.
 */
class article extends Article
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'publish_at', 'created_at', 'modified_at', 'created_by', 'modif_by', 'status', 'comments', 'showImage', 'hits'], 'integer'],
            [['title', 'subtitle', 'fulltext', 'author_alias', 'imgtitle'], 'safe'],
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
        $query = Article::find();

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
            'category_id' => $this->category_id,
            'publish_at' => $this->publish_at,
            'created_at' => $this->created_at,
            'modified_at' => $this->modified_at,
            'created_by' => $this->created_by,
            'modif_by' => $this->modif_by,
            'status' => $this->status,
            'comments' => $this->comments,
            'showImage' => $this->showImage,
            'hits' => $this->hits,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'subtitle', $this->subtitle])
            ->andFilterWhere(['like', 'fulltext', $this->fulltext])
            ->andFilterWhere(['like', 'author_alias', $this->author_alias])
            ->andFilterWhere(['like', 'imgtitle', $this->imgtitle]);

        return $dataProvider;
    }
}
