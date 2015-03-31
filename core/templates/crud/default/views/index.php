<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

use yii\helpers\Html;
use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;

Breadcrumbs::widget([
'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
'options' => ['class' => Yii::$app->params['breadcrumbClass']],
])
?>

<h1 class="page-header"><?= "<?= " ?>Html::encode($this->title) ?> <?= "<?= " ?> isset($smallText) ? Html::tag('small', $smallText) : '' ?></h1>

<!-- begin panel -->
<div class="panel panel-inverse">
    <div class="panel-heading">
        <h4 class="panel-title">Panel Title</h4>
    </div>

    <div class="panel-body">
        <?php if (!empty($generator->searchModelClass)): ?>
            <?= "    <?php " . ($generator->indexWidgetType === 'grid' ? "// " : "") ?>echo $this->render('_search', ['model' => $searchModel]); ?>
        <?php endif; ?>

        <p class="text-right">
            <?= "<?= " ?>Html::a(<?= $generator->generateString('Create {modelClass}', ['modelClass' => Inflector::camel2words(StringHelper::basename($generator->modelClass))]) ?>, ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php if ($generator->indexWidgetType === 'grid'): ?>
            <?= "<?= " ?>GridView::widget([
            'dataProvider' => $dataProvider,
            <?= !empty($generator->searchModelClass) ? "'filterModel' => \$searchModel,\n        'columns' => [\n" : "'columns' => [\n"; ?>

            <?php
            $count = 0;
            if (($tableSchema = $generator->getTableSchema()) === false) {
                foreach ($generator->getColumnNames() as $name) {
                    if (++$count < 6) {
                        echo "            [\n";
                        echo "                'attribute' => '" . $name . "',\n";
                        echo "            ],\n";
                    } else {
                        echo "           // [\n";
                        echo "           //     'attribute' => '" . $name . "',\n";
                        echo "           // ],\n";
                    }
                }
            } else {
                foreach ($tableSchema->columns as $column) {
                    $format = $generator->generateColumnFormat($column);
                    $pr = ++$count < 6 ? '' : '// ';

                    echo $pr . "\t\t[\n";
                    switch ($column->name) {
                        case 'id':
                            echo $pr . "\t\t    'attribute' => '" . $column->name . "',\n";
                            echo $pr . "\t\t    'options' => ['style' => 'width:70px;'],\n";
                            break;

                        case 'created_at':
                            echo $pr . "\t\t    'attribute' => '" . $column->name . "',\n";
                            echo $pr . "\t\t    'format' => 'date',\n";
                            echo $pr . "\t\t    'filter' => false,\n";
                            break;

                        case 'updates_at':
                            echo $pr . "\t\t    'attribute' => '" . $column->name . "',\n";
                            echo $pr . "\t\t    'format' => 'date',\n";
                            echo $pr . "\t\t    'filter' => false,\n";
                            break;
                        case 'sort':
                            echo $pr . "\t\t    'attribute' => '" . $column->name . "',\n";
                            echo $pr . "\t\t    'filter' => false,\n";
                            break;

                        case 'status':
                            echo $pr . "\t\t    'attribute' => '" . $column->name . "',\n";
                            echo $pr . "\t\t    'value' => function (\$model, \$index, \$widget) {\n";
                            echo $pr . "\t\t        return \$model->$column->name == 10 ? 'Активный' : 'Не активный';\n";
                            echo $pr . "\t\t     },\n";
                            echo $pr . "\t\t    'filter' => Html::dropDownList('" . StringHelper::basename($generator->modelClass) . "[$column->name]', \$searchModel->$column->name, ['10' => 'Активный', '0' => 'Не активный']),\n";
                            break;

                        default:
                            echo $pr . "\t\t    'attribute' => '" . $column->name . "',\n";
                            echo $format !== 'text' ? $pr . "\t\t    'format' => '$format',\n" : '';
                            break;
                    }
                    echo $pr . "\t\t],\n";
                }
            }
            ?>

            ['class' => 'yii\grid\ActionColumn','options' => ['style' => 'width:56px;']],
            ],
            ]); ?>
        <?php else: ?>
            <?= "<?= " ?>ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item'],
            'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
            },
            ]) ?>
        <?php endif; ?>

    </div>
</div>