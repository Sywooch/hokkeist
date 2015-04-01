<?php

namespace frontend\controllers;
use common\models\ArticleCategory;
use common\models\Article;
use yii\web\NotFoundHttpException;

class ArticleController extends \yii\web\Controller
{
	public $layout = 'content';

    public function actionIndex($category)
    {

    	$categoryModel = ArticleCategory::find()->where('alias = "' . $category .'"')->one();
    	if(!$categoryModel){
    		throw new NotFoundHttpException('Страница не нейдена');
    	}

    	$model = Article::find()->where('category_id = ' . $categoryModel->id)->published()->all();

    	if(!$model){
    		throw new NotFoundHttpException('Страница не нейдена');
    	}

        return $this->render('index',['model' => $model,'categry' => $categoryModel]);
    }

    public function actionView($category, $id)
    {
        return $this->render('view');
    }

}
