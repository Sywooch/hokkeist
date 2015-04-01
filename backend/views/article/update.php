<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\Article */

$this->title = 'Редактирование: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Текстовые материалы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => \yii\helpers\StringHelper::truncate($model->title, 20) , 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';

echo Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'options' => ['class' => Yii::$app->params['breadcrumbClass']],
])
?>

<h1 class="page-header">Редактирование записи #<?=$model->id ?></h1>


<?=
$this->render('_form', [
    'model' => $model,
])
?>
