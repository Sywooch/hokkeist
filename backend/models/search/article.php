<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Article as ArticleModel;

/**
 * article represents the model behind the search form about `common\models\Article`.
 */
class article extends ArticleModel {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'category_id', 'publish_at', 'created_at', 'updated_at', 'creator_id', 'updator_id', 'status', 'comments', 'showImage', 'hits', 'sort'], 'integer'],
            [['title', 'subtitle', 'fulltext', 'author_alias', 'imgtitle'], 'safe'],
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
        $query = Article::find();

        if (!$params['sort'])
            $query->orderBy('sort,ID DESC');
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
            'updated_at' => $this->updated_at,
            'creator_id' => $this->creator_id,
            'updator_id' => $this->updator_id,
            'status' => $this->status,
            'comments' => $this->comments,
            'showImage' => $this->showImage,
            'hits' => $this->hits,
            'sort' => $this->sort,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'subtitle', $this->subtitle])
                ->andFilterWhere(['like', 'fulltext', $this->fulltext])
                ->andFilterWhere(['like', 'author_alias', $this->author_alias])
                ->andFilterWhere(['like', 'imgtitle', $this->imgtitle]);

        return $dataProvider;
    }

}
