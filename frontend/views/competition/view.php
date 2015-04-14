<?php

use yii\helpers\Url;

$this->title = $model->name . ', ' . $model->season->name;
?>
<h1><?= $model->name ?> <small><?=$model->season->name ?></small></h1>

<p>
    Информация по данному соревнованию временно отсутствует.
</p>

<?= $this->render('_footer',['model' => $model]) ?>

