<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model common\models\team */
/* @var $form yii\widgets\ActiveForm */
?>

<legend><?= $model->lastname . ' ' . $model->firstname . ' ' . $model->middlename ?></legend>
<div class="row">
    <div class="col-xs-2 col-lg-2">
        Фотография
    </div>
    <div class="col-xs-5 col-lg-5">
        <?=
        DetailView::widget([
            'model' => $model,
            'options' => ['class' => 'table table-rigth-align'],
            'attributes' => [
                [
                    'attribute' => 'height',
                ],
                [
                    'attribute' => 'weight',
                ],
                [
                    'attribute' => 'grip',
                ],
                [
                    'attribute' => 'role_id',
                    'value' => $model->role->name,
                ],
                [
                    'attribute' => 'city_id',
                    'value' => $model->city->name,
                ],
                
            ],
        ])
        ?>
    </div>
    <div class="col-xs-5 col-lg-5">
        <?=
        DetailView::widget([
            'model' => $model,
            'options' => ['class' => 'table table-rigth-align'],
            'attributes' => [
                [
                    'attribute' => 'birthday',
                    'format' => 'date',
                ],
                [
                    'attribute' => 'birth_place',
                ],
                [
                    'attribute' => 'email',
                    'format' => 'email',
                ],
                [
                    'attribute' => 'phone',
                ],
        
                [
                    'attribute' => 'address',
                ],
             
                
            ],
        ])
        ?>
    </div>
</div>