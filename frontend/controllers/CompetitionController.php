<?php

namespace frontend\controllers;

use common\models\Competition;
use yii\data\Pagination;

class CompetitionController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = Competition::find();
        $pagination = new Pagination(['totalCount' => $query->count(), 'pageSize'=>2]);
        $model = $query->all();

        return $this->render('index',['model' => $model, 'pagination' => $pagination]);

    }

    public function actionView()
    {
        return $this->render('view');
    }

}
