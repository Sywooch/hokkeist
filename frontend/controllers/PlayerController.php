<?php

namespace frontend\controllers;

use common\models\Player;
use yii\data\Pagination;

class PlayerController extends \yii\web\Controller
{
    public function actionAbout($id)
    {
        return $this->render('about');
    }


    public function actionIndex()
    {

        $query = Player::find();
        $pagination = new Pagination(['totalCount' => $query->count(), 'pageSize'=>2]);
        $model = $query->all();

        return $this->render('index',['model' => $model, 'pagination' => $pagination]);
    }

    public function actionPhotos($id)
    {
        return $this->render('photos');
    }

    public function actionView($id)
    {
        $model = \common\models\Player::findOne($id);
        return $this->render('view',['model' => $model]);
    }
    
    public function actionSeacrh($char)
    {
        return $this->render('search');
    }

}
