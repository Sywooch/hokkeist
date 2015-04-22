<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PhotoGallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="col-md-8">
        <div class='tab-content'>


            <legend>Основные данные</legend>

            <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
            <?= $form->field($model, 'sort')->textInput() ?>

            <?= Html::activeLabel($model, 'description') ?>
            <?php
            echo yii\imperavi\Widget::widget([
                // You can either use it for model attribute
                'model' => $model,
                'attribute' => 'description',
                'options' => [
//            'toolbar' => false,
                    'css' => 'wym.css',
                ],
                'plugins' => [
                    'fullscreen',
//            'clips'
                ]
            ]);
            ?>
            <?= Html::error($model, 'description', ['class' => 'help-block', 'style' => 'color:#ca0000']) ?>

            <?= $form->field($model, 'image_')->fileInput() ?>
            <?= $form->field($model, 'images_[]')->fileInput(['multiple' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

        </div>
    </div>
    <div class="col-md-4">
        <div class="tab-content">
            <legend>Обложка альбома</legend>

            <?= $form->field($model, 'image_')->fileInput() ?>
            <?php
            if (!$model->isNewRecord && $image = $model->getImage('_medium', ['style' => 'max-width:100%'])) {
                echo $form->field($model, 'deleteImage')->checkbox();
                echo $image;
            }
            ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>

<?php if ($photos): ?>
    <div class="gallery isotope" id="gallery" style="position: relative; overflow: hidden;">
        <?php
        foreach ($photos as $photo) {
           echo $this->render('_photo', ['model' => $model, 'photo' => $photo]);
        }
        ?>
    </div>
<?php endif; ?>
