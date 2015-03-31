
<div id="players-table-container" class="news-list">
    <table>
        <thead>
        <tr>
            <td>НАИМЕНОВАНИЕ</td>
            <td>СЕЗОН</td>
            <td>ТЕКУЩИЙ ЭТАП</td>
            <td>ТЕКУЩИЙ ТУР</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($model as $item) : ?>
            <tr>
                <td><a href="<?= yii\helpers\Url::to(['competition/view', 'id' => $item->id]) ?>"><?= $item->name ?></a></td>
                <td><?= $item->season->name ?></td>
                <td>-</td>
                <td>-</td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= \yii\widgets\LinkPager::widget([
    'pagination' => $pagination,
]); ?>
