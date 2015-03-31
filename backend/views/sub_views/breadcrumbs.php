<?php

use yii\widgets\Breadcrumbs;

if (!Yii::$app->request->isAjax):
    echo Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        'options' => ['class' => Yii::$app->params['breadcrumbClass']],
    ]);
endif;
?>