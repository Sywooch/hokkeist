<?php include __DIR__ . "/../_sub/abcBar.php" ?>

<div id="players-table-container" class="news-list">
    <table>
        <thead>
        <tr>
            <td>НАЗВАНИЕ</td>
            <td>ГОРОД</td>
            <td>ОРГАНИЗАЦИЯ</td>
            <td>ДАТА ОСНОВАНИЯ</td>
            <td>КОНТАКТЫ</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($model as $team) : ?>
            <tr>
                <td><a href="<?= yii\helpers\Url::to(['team/view', 'id' => $team->id]) ?>"><?= $team->name ?></a></td>
                <td><?= $team->city->name ?></td>
                <td><?= $team->organization->name ?></td>
                <td><?= $team->name ?></td>
                <td><?= $team->contacts ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

