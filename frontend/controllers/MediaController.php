<?php

namespace frontend\controllers;

use Yii;
use common\models\PhotoGallery;

class MediaController extends \yii\web\Controller {

    public $layout = 'content';

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionGallery($id) {
        $model = PhotoGallery::find()->where(['id' => $id])->with('photos')->one();
        if (!$model)
            throw new \yii\web\HttpException(404, 'Страница не найдена');

        return $this->render('galleryView', ['model' => $model]);
    }

    public function actionPhoto() {
        return $this->render('photo');
    }

    public function actionVideo() {
        return $this->render('video');
    }

}
