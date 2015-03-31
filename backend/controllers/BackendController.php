<?php

namespace backend\controllers;

use Yii;
use yii\base\InlineAction;
use yii\helpers\Url;

/**
 * Controller is the base class of web controllers.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class BackendController extends \yii\web\Controller {

    public function actionCreate() {
        $model = new season();
        $model->loadDefaultValues();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->refresh();
            $this->redirect('index');
        }

        if (Yii::$app->request->isAjax):
            return $this->renderAjax('create', [
                        'model' => $model,
            ]);
        else:
            return $this->render('create', [
                        'model' => $model,
            ]);
        endif;

    }

}
