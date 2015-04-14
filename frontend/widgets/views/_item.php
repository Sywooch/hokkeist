<div class="<?= $i != 0 ? "hidden" : ''; ?>">
    <a href="<?= $model->link ?>">
        <img width="470"  src="<?= $model->imageLink ?>" alt="<?= yii\helpers\Html::encode($model->title) ?>"/>
        <span class="nm-title">
            <?= yii\helpers\Html::encode($model->title) ?>
        </span>
    </a>
</div>