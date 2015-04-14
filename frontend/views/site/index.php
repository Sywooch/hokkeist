<?php
/* @var $this yii\web\View */
$this->title = 'Федерация хоккея с шайбой ХМАО-Югры, официальный сайт';
?>

<?= frontend\widgets\NewsBlock::widget() ?>
<?= frontend\widgets\PlayerBlock::widget() ?>

<div id="foto-video">
    <div class="col-lg-5">
        <a class="fv-title" href="#">
            <img src="/img/foto-1.jpg" height="192" width="334" alt="">
            <span class="fv-title-text">Фотогалерея</span>
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