
<?= \Yii::$app->controller->id != 'search' ? frontend\widgets\SimplySearchBlock::widget(['options' => ['visible' => 1]]) : '' ?>

<?= frontend\widgets\CalendarBlock::widget(['options' => ['visible' => 1]]) ?>


<div class="widget clearfix">
    <div id="ticket" class="col-lg-12">
        <div class="hr-min-top"></div>
        <a href="#" onclick=" alert('Интернет-магазин по покупке билетов пока не доступен');
                return false;">
            <span>Купить билет</span>
            <span>На матч</span>
        </a>
        <div class="hr-min-bottom"></div>
    </div>
</div>


<?= frontend\widgets\SubscribeBlock::widget(['options' => ['visible' => 1]]) ?>

