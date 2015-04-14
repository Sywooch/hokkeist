<?php

use yii\helpers\Url;
?>
<div class="player-footer">
    <div class="hr"></div>
    <div>
        <div class="col-lg-3 no-padding">
            <a class="player-footer-icon" href="<?= Url::to(['competition/index']) ?>">
                <div id="back-to"></div>
                Возврат<br>к списку</a>
        </div>
        <div class="col-lg-3 no-padding">

        </div>
        <div class="col-lg-3 no-padding">

        </div>
        <div class="col-lg-4 no-padding">
            <div class="shared">Поделиться в
                <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?= \yii\helpers\Url::current(array(), true); ?>" class="soc-links fb"></a>
                <a target="_blank" href="http://vk.com/share.php?url=<?= \yii\helpers\Url::current(array(), true); ?>&title=<?= yii\helpers\Html::encode($model->name) ?>" class="soc-links vk"></a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>