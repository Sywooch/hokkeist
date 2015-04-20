<?php

namespace frontend\controllers;

use Yii;

class MediaController extends \yii\web\Controller {

    public $layout = 'content';

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionPhoto() {
        return $this->render('photo');
    }

    public function actionVideo() {
        return $this->render('video');
    }

}
