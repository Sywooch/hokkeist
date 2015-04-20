<?php

namespace frontend\controllers;

use Yii;

class SubscribeController extends \yii\web\Controller {

    public $layout = 'content';

    public function actionIndex() {

        $model = new \common\models\Subscribe;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($m = \common\models\Subscribe::find()->where('email = "' . $model->email . '"')->one()) {
                $m->tour = 0;
                $m->news = 0;
                $m->load(Yii::$app->request->post());
                $m->status = \common\models\Subscribe::STATUS_ACTIVE;
                $m->save();
            } else
                $model->save();

//            Yii::$app->response->refresh();
            
            return $this->render('success', ['model' => $model]);
        }

        return $this->render('subscribe', ['model' => $model]);
    }

}
