<?php

namespace frontend\controllers;

use common\models\ArticleCategory;
use common\models\Article;
use yii\web\NotFoundHttpException;

class ArticleController extends \yii\web\Controller {

    public $layout = 'content';

    public function actionIndex($category) {

        $categoryModel = ArticleCategory::find()->where('alias = "' . $category . '"')->one();
        if (!$categoryModel) {
            throw new NotFoundHttpException('Страница не нейдена');
        }

        //Получаем все записи из дочерних элементов
        $c = array();
        $c[] = $categoryModel->id;

        if ($categoryModel->parent_id == 0) {
            $cChild = ArticleCategory::find()->where('parent_id = "' . $categoryModel->id . '"')->select('id')->asArray()->all();
            foreach ($cChild as $child) {
                $c[] = $child['id'];
            }
        }

        $model = Article::find()->where('category_id IN(' . implode(',', $c) . ')')->published()->all();
        if (!$model) {
            throw new NotFoundHttpException('Страница не нейдена');
        }

        return $this->render('index', ['model' => $model, 'category' => $categoryModel]);
    }

    public function actionView($category, $id) {
        $model = Article::findOne($id);

        return $this->render('view', ['model' => $model]);
    }

    public function actionSingle($category) {
        $categoryId = ArticleCategory::find()->where('alias = "' . $category . '"')->one();
        $model = Article::find()->where('category_id = ' . $categoryId->id)->published()->one();

        if (!$model)
            throw new \yii\web\HttpException(404, 'Страница не найдена');

//        $this->view->title = $model->title;
        return $this->render('view', ['model' => $model]);
    }

}
