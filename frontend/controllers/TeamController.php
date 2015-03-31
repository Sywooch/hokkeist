<?php

namespace frontend\controllers;

class TeamController extends \yii\web\Controller
{
    public function actionHistory()
    {
        return $this->render('history');
    }

    public function actionIndex()
    {
        $model = \common\models\Team::find()->all();
        return $this->render('index',['model' => $model]);
    }

    public function actionView($id)
    {
        $model = \common\models\Team::findOne($id);
        
        return $this->render('view',['model' => $model]);
    }

}
