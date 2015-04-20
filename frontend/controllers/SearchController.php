<?php

namespace frontend\controllers;

use Yii;
use common\models\ArticleCategory;
use common\models\Article;
use yii\web\NotFoundHttpException;
use common\models\Team;
use common\models\Player;
use frontend\models\SearchForm;

class SearchController extends \yii\web\Controller {

    public $layout = 'content';
    private $model;

    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->model = new SearchForm();
    }

    public function actionIndex() {
        if ($this->model->load(Yii::$app->request->get()) && $this->model->validate()) {
            $result = NULL;
            $target = $this->model->target;

            if (!empty($this->model->text)) {
                if (empty($target)) {
                    $targets = ['player','team','news'];
                    foreach ($targets as $target){
                        $result[$target] = call_user_method($target . 'Query', $this);
                    }
                } else
                    $result = call_user_method($target . 'Query', $this);
            }
        }


        return $this->render('index', ['model' => $this->model, 'result' => $result]);
    }

    private function playerQuery() {
        return Player::find()->where("`lastname` LIKE '%{$this->model->text}%'")
                        ->orWhere("`firstname` LIKE '%{$this->model->text}%'")
                        ->andWhere('status = ' . \common\models\Player::STATUS_ACTIVE)->all();
    }

    private function teamQuery() {
        return Team::find()->where("`name` LIKE '%{$this->model->text}%'")
                        ->orWhere("`abbr`LIKE '%{$this->model->text}%'")
                        ->andWhere('`status` = ' . \common\models\Team::STATUS_ACTIVE)->all();
    }

    private function newsQuery() {
        return Article::find()->where("`title` LIKE '%{$this->model->text}%'")
                        ->orWhere("`fulltext` LIKE '%{$this->model->text}%'")
                        ->orWhere("`subtitle` LIKE '%{$this->model->text}%'")
                        ->andWhere('`status` = ' . \common\models\Article::STATUS_ACTIVE)->all();
    }

}
