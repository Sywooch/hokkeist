<div id="foto-video">
    <div class="col-lg-5">
        <a class="fv-title" href="<?= \yii\helpers\Url::to(['media/gallery', 'id' => $model->id]) ?>">
            <?= $model->Image ?>
            <!--<img src="/img/foto-1.jpg" height="192" width="334" alt="">-->
            <span class="fv-title-text"><?= $model->name ?></span>
            <div class="fv-hover photo"></div>
        </a>
    </div>
    <div class="col-lg-5">
        <a class="fv-title" href="#">
            <img src="/img/foto-2.jpg" height="192" width="334" alt="">
            <span class="fv-title-text">Видеорепортаж с места событий</span>
            <div class="fv-hover video"></div>
        </a>
    </div>
</div>