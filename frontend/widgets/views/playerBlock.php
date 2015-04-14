<div id="player-calendar">
    <div class="col-lg-6">
        <div id="player-cursor"></div>
        <a title='<?= $model[0]->fullName ?>' href='<?= \yii\helpers\Url::to(['player/view', 'id' => $model[0]->id]) ?>'>
            <img id="player-border" src="/img/main/player-border.png" height="265" width="265" alt="">
            <img id="player-main-foto" src="<?= ($model[0]->imageLink) ? $model[0]->imageLink : "/img/template/player_empty.jpg" ?>" height="265" width="265" alt="Фото <?= $model[0]->fullName ?>, ХК <?= $model[0]->team->name ?> ">
        </a>
    </div>

    <div class="col-lg-6">
        <div class="col-xs-12">
            <div class="sub-title">Хоккеист</div>
            <div class="title">
                <a href="<?= \yii\helpers\Url::to(['player/view', 'id' => $model[0]->id]) ?>"><?= $model[0]->fullname ?></a>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="sub-title">Играет в</div>
            <div class="title">
                <a href="<?= \yii\helpers\Url::to(['/team/view', 'id' => $model[0]->team->id]) ?>"><?= $model[0]->team->name ?></a>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="sub-title">На позиции</div>
            <div class="title"><?= $model[0]->role->name ?></div>
        </div>
        <div class="col-xs-12">
            <div id="hr-player-calendar"></div>
            <div class="sub-title">Еще игроки из ХК &Lt;<?= yii\helpers\Html::a($model[0]->team->name, ['taem/view', 'id' => $model[0]->team_id]) ?>&Gt;</div>
            <div id="players">
                <ul>
                    <?php for ($i = 1; $i < count($model); $i++): ?>
                        <li>
                            <a class="sub-player" href="<?= \yii\helpers\Url::to(['player/view', 'id' => $model[$i]->id]) ?>">
                                <img class="player-border-small"  src="/img/main/player-border-small.png" height="58" width="58" alt="Шаблон">
                                <img class="player-foto-small" src="<?= $model[$i]->getImageLink('_small') ? $model[$i]->getImageLink('_small') : "/img/template/player_empty_small.jpg" ?>" alt="<?= $model[$i]->fullName ?>">
                                <span class="sub-player-name"><?= $model[$i]->fullName ?></span>
                            </a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
    </div>
</div>