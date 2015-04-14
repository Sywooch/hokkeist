<?php

namespace frontend\controllers;

use common\models\Competition;
use yii\data\Pagination;

class CompetitionController extends \yii\web\Controller {

//    public $layout = 'content';

    public function actionIndex() {
        $query = Competition::find();
        $pagination = new Pagination(['totalCount' => $query->count(), 'pageSize' => 2]);
        $model = $query->all();

        return $this->render('index', ['model' => $model, 'pagination' => $pagination]);
    }

    public function actionView($id) {
        $this->layout = 'content';
        $model = Competition::findOne($id);

        if (!$model)
            throw new \yii\web\HttpException(404, 'Соревнование не найдено');

        return $this->render('view', ['model' => $model]);
    }

}
