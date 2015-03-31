<?php include __DIR__ . "/../_sub/abcBar.php" ?>

<?php \yii\helpers\VarDumper::dump($model, 15, true) ?> 

<div id="players-table-container" class="news-list">
    <?php if (count($model) > 0): ?>
        <table>
            <thead>
                <tr>
                    <td>ID НОМЕР</td>
                    <td>ФИО</td>
                    <td>КЛУБ</td>
                    <td>АМПЛУА</td>
                    <td>ВОЗРАСТ</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($model as $item) : ?>
                    <tr>
                        <td><?= $item->id_ ?></td>
                        <td><a href="<?= yii\helpers\Url::to(['player/view', 'id' => $item->id]) ?>"><?= $item->fullname ?></a></td>
                        <td><a href="<?= yii\helpers\Url::to(['team/view', 'id' => $item->team->id]) ?>"><?= $item->team->name ?></a></td>
                        <td><?= $item->role ?></td>
                        <td><?= $item->age ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Информация по игрокам отсутствует</p>
    <?php endif; ?>
</div>
<?=
\yii\widgets\LinkPager::widget([
    'pagination' => $pagination,
]);
?>
