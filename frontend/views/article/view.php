<?php

use himiklab\colorbox\Colorbox;
?>
<h1><?= $model->title ?></h1>

<?= $model->subtitle ? yii\helpers\Html::tag('p', '<b>' . $model->subtitle) . '</b>' : '' ?>

<?php if ($model->image) : ?>
    <div class="col-lg-7 no-padding news-image">
        <?=
        Colorbox::widget([
            'targets' => [
                '.cboxElement' => [
                    'maxWidth' => 800,
                    'maxHeight' => 600,
                ],
            ],
            'coreStyle' => 3
        ])
        ?>
        <a href="<?= $model->getImageLink("_original") ?>" class="colorbox-img cboxElement">
            <?= $model->getImage() ?>
        </a>
    </div>
<?php endif; ?>
<?= $model->fulltext; ?>

<?= Yii::$app->controller->renderPartial('_shareBlock', ['model' => $model]); ?>

