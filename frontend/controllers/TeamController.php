<?php

namespace frontend\controllers;
use yii\data\Pagination;

class TeamController extends \yii\web\Controller
{
    public function actionHistory()
    {
        return $this->render('history');
    }

    public function actionIndex($c = NULL)
    {
        $query = \common\models\Team::find();
        if ($c) {
            $query->where('LOWER(name) LIKE "' . $c . '%"');
        }
        $pagination = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10]);
        $model = $query->all();

        return $this->render('index', ['model' => $model, 'pagination' => $pagination]);

    }

    public function actionView($id)
    {
        $model = \common\models\Team::findOne($id);
        
        return $this->render('view',['model' => $model]);
    }

}
