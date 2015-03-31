<?PHP use yii\helpers\Html; ?>
<div class="btn-group pull-right">
    <?= Html::a('<i class="fa fa-lg fa-edit"></i> Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm m-r-5']) ?>
    <?=
    Html::a('<i class="fa fa-lg fa-trash"></i> Удалить', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger btn-sm',
        'data' => [
            'confirm' => 'Вы действительно хотите удалить эту запись?',
            'method' => 'post',
        ],
    ])
    ?>
</div>