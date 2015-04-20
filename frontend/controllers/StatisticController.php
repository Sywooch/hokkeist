<?php

namespace frontend\controllers;

use Yii;

class StatisticController extends \yii\web\Controller {

    public $layout = 'content';

    public function actionIndex() {

        return $this->render('index');
    }

}
