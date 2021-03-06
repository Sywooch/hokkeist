<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\ArticleCategory;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="row">
    <div class="col-md-8">
        <div class="tab-content">

            <legend>Основные данные</legend>
            <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>
            <?= $form->field($model, 'subtitle')->textarea(['rows' => 2]) ?>

            <?= Html::activeLabel($model, 'fulltext') ?>

            <?php
            echo yii\imperavi\Widget::widget([
                // You can either use it for model attribute
                'model' => $model,
                'attribute' => 'fulltext',
                // or just for input field
//        'name' => 'my_input_name',
                // Some options, see http://imperavi.com/redactor/docs/
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
            <?= Html::error($model, 'fulltext', ['class' => 'help-block', 'style' => 'color:#ca0000']) ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="tab-content">


            <legend>Дополнительные сведения</legend>   

            <div class="form-group field-article-author_alias">
                <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(ArticleCategory::find()->asArray()->all(), 'id', 'name'), ['prompt' => '']) ?>
                <?= Html::activeLabel($model, 'publish_at') ?>
                <?=
                DateTimePicker::widget([
                    'model' => $model,
                    'attribute' => 'publish_at',
                    'convertFormat' => true,
                    'type' => DateTimePicker::TYPE_INPUT,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => Yii::$app->formatter->dateFormat,
                    ],
                ]);
                ?>
            </div>

            <?= $form->field($model, 'author_alias')->textInput(['maxlength' => 255]) ?>
            <?= $form->field($model, 'sort')->textInput() ?>
            <?= $form->field($model, 'comments')->checkbox() ?>
            <?= $form->field($model, 'status')->checkbox(['value' => $model::STATUS_ACTIVE]) ?>


            <legend>Изображение</legend>
            <?= $form->field($model, 'showImage')->checkbox() ?>
            <?= $form->field($model, 'imgtitle')->textInput(['maxlength' => 255]) ?>
            <?= $form->field($model, 'image_')->fileInput() ?>

            <?php
            if (!$model->isNewRecord && $image = $model->getImage('_medium', ['style' => 'max-width:100%'])) {
                echo $form->field($model, 'deleteImage')->checkbox();
                echo $image;
            }
            ?>

        </div>
    </div>
</div>

<div class="form-group">
    <?= Html::submitButton('Сохранить и закрыть', ['class' => 'btn btn-primary', 'name' => 'Article[close]', 'value' => 'closeAll']) ?>
    <?= Html::submitButton('Сохранить и создать еще', ['class' => 'btn btn-success', 'name' => 'Article[close]', 'value' => 'closeAndNew']) ?>
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success', 'name' => 'Article[close]', 'value' => 'closeAndView']) ?>
</div>
<?php ActiveForm::end(); ?>