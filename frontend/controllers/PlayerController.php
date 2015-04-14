<?php

namespace frontend\controllers;

use common\models\Player;
use yii\data\Pagination;

class PlayerController extends \yii\web\Controller {

    public function actionResume($id) {
        return $this->render('resume', ['model' => $this->getPlayer($id)]);
    }

    public function actionStatistic($id) {
        return $this->render('statistic', ['model' => $this->getPlayer($id)]);
    }

    public function actionHistory($id) {
        return $this->render('history', ['model' => $this->getPlayer($id)]);
    }

    public function actionIndex($c = NULL) {

        $query = Player::find();
        if ($c) {
            $query->where('LOWER(firstname) LIKE "' . $c . '%"');
            $query->orWhere('LOWER(lastname) LIKE "' . $c . '%"');
        }
        $pagination = new Pagination(['totalCount' => $query->count(), 'pageSize' => 2]);
        $model = $query->all();

        return $this->render('index', ['model' => $model, 'pagination' => $pagination]);
    }

    public function actionPhotos($id) {
        return $this->render('photos', ['model' => $this->getPlayer($id)]);
    }

    public function actionView($id) {
        return $this->render('view', ['model' => $this->getPlayer($id)]);
    }

    public function actionSeacrh($char) {
        return $this->render('search');
    }

    public function getPlayer($id) {
        $model = \common\models\Player::findOne($id);
        if (!$model)
            throw new \yii\web\HttpException(404, 'Игрок не найден в базе');
        return $model;
    }

}
