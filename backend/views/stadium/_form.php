<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\City;

/* @var $this yii\web\View */
/* @var $model common\models\stadium */
/* @var $form yii\widgets\ActiveForm */



?>



<div class="stadium-form">
    <?php
    $form = ActiveForm::begin([
                'id' => 'my-form-category',
//                'layout' => 'horizontal'
//            'beforeSubmit' => 'submitForm'
    ]);

//    \yii\helpers\VarDumper::dump($model->getErrors(), 15, true);

    $submit_button = Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);

    $js = <<<JS
// get the form id and set the event
$('form#{$model->formName()}').on('beforeSubmit', function(e) {
   var \$form = $(this);
   // do whatever here, see the parameter \$form? is a jQuery Element to your form
}).on('submit', function(e){
    e.preventDefault();
});
JS;
    $this->registerJs($js);
    ?>

    <?php
    $tab_one = <<<Tab
    <div class="row">
        <div class="col-xs-8">
       {$form->field($model, 'name')->textInput(['maxlength' => 100])}
        </div>

        <div class="col-xs-4">
       {$form->field($model, 'abbr')->textInput(['maxlength' => 255])}
        </div>
    </div>
       {$form->field($model, 'fullname')->textInput(['maxlength' => 255])}
    {$form->field($model, 'phone')->textInput(['maxlength' => 100])}
    {$form->field($model, 'description')->textarea(['rows' => 3])}
    {$form->field($model, 'capacity')->textInput()}
    {$form->field($model, 'sort')->textInput(['class' => 'form-control xs-span-6'])}
    {$form->field($model, 'status')->checkbox(['value' => $model::STATUS_ACTIVE])}
    
    <div class="modal-footer">
        {$submit_button}
    </div>
            
Tab;

    $tab_two = <<<Tab
         <div class="row">
        <div class="col-xs-4">
            {$form->field($model, 'city_id')->dropDownList(ArrayHelper::map(City::find()->asArray()->all(), 'id', 'name'))}
        </div>
        <div class="col-xs-8">
            {$form->field($model, 'address')->textInput(['maxlength' => 255])}
        </div>
    </div>
    
   
   <script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=sleGVvh-2SYhLhdyO2vI-JPP1K9WKAHl&width=100%&height=350"></script>
   
Tab;

    echo \yii\bootstrap\Tabs::widget([
        'navType' => 'nav-pills',
        'items' => [
            [
                'label' => 'Основное',
                'content' => $tab_one,
                'active' => true
            ],
            [
                'label' => 'Адрес и карта',
                'content' => $tab_two,
                'headerOptions' => [],
                'options' => ['id' => 'myveryownID'],
            ],
            [
                'label' => 'Фотографии',
                'content' => '<p>Фотографии отсутствуют</p>',
            ],
        ],
    ]);
    ?>

    <?php //    yii\helpers\VarDumper::dump($model->getErrors(),15,true);   ?>
    <?php ActiveForm::end(); ?>

</div>
