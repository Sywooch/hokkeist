<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
<?php \yii\helpers\VarDumper::dump($model->getErrors(),15,true);?>  

    <?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'password')->textInput() ?>
    <?= $form->field($model, 'email')->textInput() ?>
    <?= $form->field($model, 'first_name')->textInput() ?>
    <?= $form->field($model, 'last_name')->textInput() ?>
    
    <?= $form->field($model, 'status')->checkbox(['value' => $model::STATUS_ACTIVE]) ?>

    <div class="modal-footer">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
