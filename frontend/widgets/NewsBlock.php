<?php

namespace frontend\widgets;

use common\models\Article;
use common\models\ArticleCategory;

class NewsBlock extends \yii\base\Widget {

    public $limit = 4;

    public function init() {
        parent::init();

        $model = Article::find()->published()->limit($this->limit)->where('category_id = 1')->all();

        if ($model)
            echo $this->render('newsBlock', ['model' => $model]);
    }

}
