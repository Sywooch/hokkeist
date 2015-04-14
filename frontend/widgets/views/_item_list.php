<li>
    <a href="<?= $model->link ?>">
        <span class="mnl-date"><?= Yii::$app->formatter->asDate($model->publish_at, 'H:i, dd.MM.yyyy') ?></span>
        <span class="mnl-title"><?= yii\helpers\Html::encode(\yii\helpers\StringHelper::truncate(strip_tags($model->title), 50)) ?></span>
    </a>
</li>