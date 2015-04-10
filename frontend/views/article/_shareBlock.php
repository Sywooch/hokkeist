
<div class="hr"></div>
<div class="shared">
    Поделиться в
    <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?= $model->getLink(true) ?>" class="soc-links fb"></a>
    <a target="_blank" href="http://vk.com/share.php?url=<?= $model->getLink(true) ?>&title=<?= yii\helpers\Html::encode($model->title) ?>&description=<?= yii\helpers\Html::encode($model->subtitle) ?>&image=<?= $model->imageLink ?>" class="soc-links vk"></a>
</div>