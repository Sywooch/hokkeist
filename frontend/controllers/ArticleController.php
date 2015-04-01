<?php

namespace frontend\controllers;

class ArticleController extends \yii\web\Controller
{
    public function actionIndex($category)
    {
        return $this->render('index');
    }

    public function actionView($category, $id)
    {
        return $this->render('view');
    }

}
