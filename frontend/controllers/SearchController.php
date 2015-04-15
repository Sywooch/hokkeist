<?php

namespace frontend\controllers;

use Yii;
use common\models\ArticleCategory;
use common\models\Article;
use yii\web\NotFoundHttpException;

class SearchController extends \yii\web\Controller {

    public $layout = 'content';

    public function actionIndex() {

        $model = new \frontend\models\SearchForm();

        if ($model->load(Yii::$app->request->get())) {
//            \yii\helpers\VarDumper::dump($model,15,true);
            switch ($model->target):
                case('player'):
                    if(empty($model->text))
                        break;
                    $result = \common\models\Player::find()->where("LOWER(lastname) like'%{$model->text}%'")
                                    ->orWhere("LOWER(firstname) like'%{$model->text}%'")->all();
//                                    \yii\helpers\VarDumper::dump($result,15,true);
                    break;
            endswitch;
            
            
        }

    
        return $this->render('index', ['model' => $model, 'result' => $result]);
    }

}
