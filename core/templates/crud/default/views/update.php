<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= $generator->generateString('Редактирование: ', ['modelClass' => Inflector::camel2words(StringHelper::basename($generator->modelClass))]) ?> . ' ' . $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model-><?= $generator->getNameAttribute() ?>, 'url' => ['view', <?= $urlParams ?>]];
$this->params['breadcrumbs'][] = <?= $generator->generateString('Редактирование') ?>;
?>

<h1 class="page-header"><?= "<?= " ?> $this->title ?> <?= "<?= " ?> isset($smallText) ? yii\helpers\Html::tag('small', $smallText) : '' ?></h1>

<div class="row">
    <div class="col-md-6">
        <div data-sortable-id="ui-general-1" class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Panel title</h4>
            </div>
            <div class="panel-body">
                <?= "<?= " ?>$this->render('_form', [
                'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>