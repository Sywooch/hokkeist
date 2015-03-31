<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

Breadcrumbs::widget([
'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
'options' => ['class' => Yii::$app->params['breadcrumbClass']],
])
?>

<h1 class="page-header"><?= "<?= " ?> $this->title ?> <?= "<?= " ?> isset($smallText) ? yii\helpers\Html::tag('small', $smallText) : '' ?></h1>

<div data-sortable-id="ui-general-1" class="panel panel-inverse">
    <div class="panel-heading">
        <h4 class="panel-title">Panel title</h4>
    </div>
    <div class="panel-body">

        <p>
            <?= "<?= " ?>Html::a(<?= $generator->generateString('Редактировать') ?>, ['update', <?= $urlParams ?>], ['class' => 'btn btn-primary']) ?>
            <?= "<?= " ?>Html::a(<?= $generator->generateString('Удалить') ?>, ['delete', <?= $urlParams ?>], [
            'class' => 'btn btn-danger',
            'data' => [
            'confirm' => <?= $generator->generateString('Вы действительно хотите удалить эту запись?') ?>,
            'method' => 'post',
            ],
            ]) ?>
        </p>

        <?= "<?= " ?>DetailView::widget([
        'model' => $model,
        'attributes' => [
        <?php
        if (($tableSchema = $generator->getTableSchema()) === false) {
            foreach ($generator->getColumnNames() as $name) {
                echo "            '" . $name . "',\n";
            }
        } else {
            foreach ($generator->getTableSchema()->columns as $column) {
                $format = $generator->generateColumnFormat($column);
                echo "            [\n";
                switch ($column->name) {
                    case 'status':
                        echo "\t\t    'attribute' => '" . $column->name . "',\n";
                        echo "\t\t    'value' => \$model->$column->name == 10 ? 'Активный' : 'Не активный',\n";
                        echo $format === 'text' ? "" : "            'format' => '" . $format . "',\n";
                        break;
                    
                    default:
                        echo "\t\t    'attribute' => '" . $column->name . "',\n";
                        echo $format === 'text' ? "" : "            'format' => '" . $format . "',\n";
                        break;
                }
                echo "            ],\n";
            }
        }
        ?>
        ],
        ]) ?>
    </div>
</div>
