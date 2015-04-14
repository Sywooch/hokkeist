<?php

namespace frontend\controllers;

use common\models\ArticleCategory;
use common\models\Article;
use yii\web\NotFoundHttpException;

class SearchController extends \yii\web\Controller {

    public $layout = 'content';

    public function actionIndex($text = false, $target = NULL) {
        if ($text) {
            $text = addslashes($text);
            switch ($target):
                case('player'):
                    $model = \common\models\Player::find()->where("LOWER(lastname) like'%{$text}%'")
                            ->orWhere("LOWER(firstname) like'%{$text}%'")->all();
                    break;
            endswitch;
        }
        return $this->render('index',['model' => $model,'target' => $target]);
    }

    public function actionView($category, $id) {
        $model = Article::findOne($id);

        return $this->render('view', ['model' => $model]);
    }

}
