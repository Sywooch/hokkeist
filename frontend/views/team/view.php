<?php
/* @var $this yii\web\View */
$this->title = 'Хоккейная команда "' . $model->name . '", ' . $model->city->name . ' - история игр, статистика, состав команды';
?>

<div class="player-container">
    <div class="col-lg-6">
        <?php if (!$model->getImageLink('_medium', false, false)) : ?>
            <div id="player-cursor"></div>
            <img width="265" height="265" src="/img/template/player-border.png" id="player-border">
            <img width="265" height="265" alt="<?= $model->name ?>" src="<?= $model->imageLink ?>" id="player-main-foto">
        <?php else: ?>

        <?php endif; ?>
    </div>
    <div style="padding: 25px 0 25px 30px;" class="col-lg-6">
        <div class="col-xs-12">
            <div class="sub-title">
                Клуб
            </div>
            <div class="title"><?= $model->name ?></div>
        </div>
        <div class="clearfix">
        </div>
        <div class="col-xs-12">
            <div class="sub-title">
                Основан в
            </div>
            <div class="title">
                ---
            </div>
        </div>
        <div class="clearfix">
        </div>
        <div class="col-xs-12">
            <div class="sub-title">
                Город
            </div>
            <div class="title"> 
                <?= $model->city->name ?>
            </div>
        </div>
        <div class="clearfix">
        </div>
        <div class="col-xs-12">
            <div class="sub-title">
                Главный тренер
            </div>
            <div class="title">---</div>
        </div>
        <div class="clearfix">
        </div>
        <div class="col-xs-12">
            <div class="sub-title">
                Контактная информация
            </div>
            <div class="title-club-contact">
                <?= $model->phone ? 'Тел.: ' . $model->phone : '' ?><br />
                <?= $model->email ? 'Email: ' . $model->email : '' ?><br />
            </div>
        </div>
        <div class="clearfix">
        </div>
    </div>
    <div class="clearfix">
    </div>
    <div class="player-footer">
        <div class="hr">
        </div>
        <div>
            <div class="col-lg-4 no-padding">
                <a href="/team/" class="player-footer-icon">
                    <div id="back-to"></div>
                    Возврат <br>
                    к списку</a>
            </div>
            <div class="col-lg-4 no-padding">
                <a href="#" class="player-footer-icon">
                    <div id="read-resume">
                    </div>
                    <span>История клуба</span></a>
            </div>
            <div class="col-lg-4 no-padding">
                <div class="shared">
                    Поделиться в <a href="#" class="soc-links fb"></a> <a href="#" class="soc-links vk"></a>
                </div>
            </div>
            <div class="clearfix">
            </div>
        </div>
        <div class="clearfix">
        </div>
    </div>
</div>

<?php // Вывод команды ?>
<div id="wrapper-players-table-container">
    <div id="players-table-container-title">Состав команды</div>
    <div id="players-table-container" class="news-list">

        <table>
            <thead>
                <tr>
                    <td>ID НОМЕР</td>
                    <td>ФАМИЛИЯ, ИМЯ</td>
                    <td>АМПЛУА</td>
                    <td>ДАТА РОЖДЕНИЯ</td>
                    <td>Город</td>
                    <!--<td>КОНТРАКТ ДО</td>-->
                </tr>
            </thead>
            <tbody
            <?php if (count($model->players) > 0): ?>
                <?php foreach ($model->players as $player) : ?>
                        <tr>
                            <td><?= $player->id_ ?></td>
                            <td>
                                <a href="<?= yii\helpers\Url::to(['player/view', 'id' => $player->id]) ?>"><?= $player->fullname ?></a>
                            </td>
                            <td><?= $player->role->name ?></td>
                            <td><?= Yii::$app->formatter->asDate($player->birthday) . ' (' . $player->age . ' лет)' ?></td>
                            <td><?= $player->city->name ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" align="center">
                            Информация по игрокам отсутствует
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>


    </div>
</div>

