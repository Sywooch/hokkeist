<?php
$this->title = $model->name;
echo \himiklab\colorbox\Colorbox::widget([
    'targets' => [
        '.cboxElement' => [
            'maxWidth' => 800,
            'maxHeight' => 600,
        ],
    ],
    'coreStyle' => 3
])
?>
<div class="col-lg-12 no-padding" style="margin-bottom: 15px;">
    <div class="col-lg-7 no-padding news-image">
        <a href="<?= $model->getImageLink("_original") ?>" class="colorbox-img cboxElement">
            <?= $model->Image ?>
        </a>
    </div>
    <div class="col-lg-5 no-padding" id="media-info">
        <div class="col-xs-12">
            <div class="sub-title">Название медиатеки</div>
            <div class="title"><?= $model->name ?></div>
        </div>
        <div class="col-xs-12">
            <div class="sub-title">Автор</div>
            <div class="title">Администрация<?php // $model->date     ?></div>
        </div>
        <div class="col-xs-12">
            <div class="sub-title">12 сентября 2014, Сургут</div>
            <div class="title no-margin">Название мероприятия <br> Двухстрочное</div>
        </div>   
    </div>
</div>

<?php if ($model->photos): ?>
    <div class="col-lg-12 no-padding" id="media-all-preview">
        <?php
        foreach ($model->photos as $photo) {
            if ($photo->type_id == 3)
                echo $this->render('_photo', ['model' => $model, 'photo' => $photo]);
        }
        ?>
    </div>
<?php endif; ?>

