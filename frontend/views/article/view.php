<?php

use himiklab\colorbox\Colorbox;

$this->title = $model->title;

echo Colorbox::widget([
    'targets' => [
        '.cboxElement' => [
            'maxWidth' => 800,
            'maxHeight' => 600,
        ],
    ],
    'coreStyle' => 3
])
?>
<h1><?= $this->title ?></h1>
<?= $model->subtitle ? yii\helpers\Html::tag('p', '<b>' . $model->subtitle) . '</b>' : '' ?>

<?php if ($model->image) : ?>
    <div class="col-lg-7 no-padding news-image">
        <a title='<?= $model->imgtitle ? yii\helpers\Html::encode($model->imgtitle) : yii\helpers\Html::encode($model->title) ?>' href="<?= $model->getImageLink("_original") ?>" class="colorbox-img cboxElement">
            <?= $model->getImage() ?>
        </a>
    </div>
<?php endif; ?>
<?= $model->fulltext; ?>

<?= Yii::$app->controller->renderPartial('_shareBlock', ['model' => $model]); ?>

