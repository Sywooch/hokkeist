<?php

use yii\helpers\Url;
use yii\helpers\Html;
$title = $model[0]->category->parent->name ? $model[0]->category->parent->name : $model[0]->category->name;
$this->title = $title;
?>

<h1><?= $title ?></h1>
<div class="news-list-all">
    <?php foreach ($model as $item): ?>
        <?php $link = Url::to(['article/view', 'category' => $category->alias, 'id' => $item->id]) ?>
        <div class="col-xs-12 no-padding" id="bx_3218110189_12">
            <div class="col-xs-3 no-padding">
                <a href="<?= $link ?>">
                    <?= $item->getImage('_small'); ?>
                </a>
            </div>
            <div class="col-xs-9 no-padding">
                <span class="sub-title"><?= Yii::$app->formatter->asDate($item->publish_at, 'H:i, dd.MM.yyyy') ?></span>
                <h2>
                    <?= Html::a($item->title, $link); ?>
                </h2>
            </div>
            <div style="clear:both"></div>
            <div class='hr'></div>
        </div>
    <?php endforeach; ?>
</div>