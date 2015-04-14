<?php

use yii\helpers\Url;

$this->title = $model->fullname . ' - игрок команды "' . $model->team->name . '", ' . $model->city->name . ' - фото, резюме, история игр и статистика игрока';
?>
<div id="player-search-panel">
    <div class="col-xs-9">
        <ul>
            <li><a href="<?= Url::to(['player/search', 'char' => 'а']) ?>">а</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'б']) ?>">б</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'в']) ?>">в</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'г']) ?>">г</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'д']) ?>">д</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'ж']) ?>">ж</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'з']) ?>">з</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'и']) ?>">и</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'к']) ?>">к</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'л']) ?>">л</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'м']) ?>">м</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'н']) ?>">н</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'о']) ?>">о</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'п']) ?>">п</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'р']) ?>">р</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'с']) ?>">с</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'т']) ?>">т</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'у']) ?>">у</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'ф']) ?>">ф</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'х']) ?>">х</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'ц']) ?>">ц</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'ч']) ?>">ч</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'ш']) ?>">ш</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'щ']) ?>">щ</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'э']) ?>">э</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'ю']) ?>">ю</a></li>
            <li><a href="<?= Url::to(['player/search', 'char' => 'я']) ?>">я</a></li>
        </ul>
    </div>
    <div class="col-xs-3 no-padding">
        <div>
        </div>
    </div>
</div>

<div class="player-container">
    <div class="col-lg-6">
        <div id="player-cursor"></div>
        <img width="265" height="265" src="/img/template/player-border.png" id="player-border">
        <img width="265" height="265" alt="<?= $model->fullname ?>" src="<?= $model->imageLink ?>" id="player-main-foto">
    </div>
    <div style="padding-left: 25px" class="col-lg-6">
        <div class="col-xs-9 no-padding">
            <div class="sub-title"><?= $model->role->name ?></div>
            <div class="title"><?= $model->fullname ?></div>
        </div>
        <div class="col-xs-3">
            <div class="sub-title">Номер</div>
            <div class="title"><?= $model->id_ ?></div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-3">
            <div class="sub-title">Рост</div>
            <div class="title"><?= $model->height ? $model->height : '---' ?></div>
        </div>
        <div class="col-xs-3">
            <div class="sub-title">Вес</div>
            <div class="title"><?= $model->weight ? $model->weight : '---' ?></div>
        </div>
        <div class="col-xs-6">
            <div class="sub-title">Хват</div>
            <div class="title"><?= $model->grip ? $model->grip : '---' ?></div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-8">
            <div class="sub-title">Дата рождения</div>
            <div class="title"><?= Yii::$app->formatter->asDate($model->birthday, "php:d.m.Y") ?></div>
        </div>
        <div class="col-xs-4">
            <div class="sub-title">Возраст</div>
            <div class="title"><?= $model->age ?> лет</div>
        </div>
        <div class="clearfix"></div>

        <div class="col-xs-12">
            <div class="sub-title">Город</div>
            <div class="title"><?= $model->city->name ?></div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-12">
            <div class="sub-title">Команда</div>
            <div class="title"><a href="<?= yii\helpers\Url::to(['team/view', 'id' => $model->team->id]) ?>"><?= $model->team->name ?></a></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>

    <div class="player-footer">
        <div class="hr"></div>
        <div>
            <div class="col-lg-3 no-padding">
                <a href="<?= yii\helpers\Url::to(['player/']) ?>" class="player-footer-icon">
                    <div id="back-to"></div>
                    Возврат<br>к списку</a>
            </div>
            <div class="col-lg-3 no-padding">
                <a href="<?= yii\helpers\Url::to(['player/resume', 'id' => $model->id]) ?>" class="player-footer-icon">
                    <div id="read-resume"></div>
                    <span>Резюме</span></a>
            </div>
            <div class="col-lg-3 no-padding">
                <a href="<?= yii\helpers\Url::to(['player/photos', 'id' => $model->id]) ?>" class="player-footer-icon">
                    <div id="photoarchive"></div>
                    <span>Фотоархив</span></a>
            </div>
            <div class="col-lg-4 no-padding">
                <div class="shared">Поделиться в
                    <a href="#" class="soc-links fb"></a>
                    <a href="#" class="soc-links vk"></a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>




<div class="player-statistic-table-title">14/15</div>
<div class="player-statistic-table">
    <table>
        <thead>
            <tr>
                <td>Команда</td>
                <td>Возраст.группа</td>
                <td>И</td>
                <td>Г</td>
                <td>П</td>
                <td>О</td>
                <td>ШТР</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <a href="#">Амур (Хабаровск)</a>
                </td>
                <td>17</td>
                <td>10</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="player-statistic-table-title">Регулярный чемпионат 2008/2009</div>
<div class="player-statistic-table">
    <table>
        <thead>
            <tr>
                <td>Турнир / Команда</td>
                <td>№</td>
                <td>И</td>
                <td>Ш</td>
                <td>А</td>
                <td>О</td>
                <td>+/-</td>
                <td>ШТР</td>
                <td>ШР</td>
                <td>ШБ</td>
                <td>ШМ</td>
                <td>ШО</td>
                <td>ШП</td>
                <td>РБ</td>
                <td>БВ</td>
                <td>%БВ</td>
                <td>БВ/И</td>
                <td>ВБР</td>
                <td>ВВБР</td>
                <td>%ВБР</td>
                <td>ВП/И</td>
                <td>СМ/И</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <a href="#">Амур (Хабаровск)</a>
                </td>
                <td>77</td>
                <td>10</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>6</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>8</td>
                <td>0.0</td>
                <td>0.8</td>
                <td>1</td>
                <td>1</td>
                <td>100.0</td>
                <td>10:07</td>
                <td>12.6</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="player-statistic-table-title">Суммарная статистика КХЛ</div>
<div class="player-statistic-table">
    <table>
        <thead>
            <tr>
                <td>Турнир / Команда</td>
                <td>№</td>
                <td>И</td>
                <td>Ш</td>
                <td>А</td>
                <td>О</td>
                <td>+/-</td>
                <td>ШТР</td>
                <td>ШР</td>
                <td>ШБ</td>
                <td>ШМ</td>
                <td>ШО</td>
                <td>ШП</td>
                <td>РБ</td>
                <td>БВ</td>
                <td>%БВ</td>
                <td>БВ/И</td>
                <td>ВБР</td>
                <td>ВВБР</td>
                <td>%ВБР</td>
                <td>ВП/И</td>
                <td>СМ/И</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <a href="#">Регулярный чемп.</a>
                </td>
                <td>77</td>
                <td>10</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>6</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>8</td>
                <td>0.0</td>
                <td>0.8</td>
                <td>1</td>
                <td>1</td>
                <td>100.0</td>
                <td>10:07</td>
                <td>12.6</td>
            </tr>
        </tbody>
    </table>
</div>
<div id="player-table-signs">
    <div class="col-lg-4 no-padding">
        <ul>
            <li><span>И</span> - количество проведенных игр,</li>
            <li><span>Ш</span> - заброшенные шайбы,</li>
            <li><span>А</span> - передачи,</li>
            <li><span>О</span> - очки,</li>
            <li><span>+/-</span> - плюс/минус,</li>
            <li><span>ШТР</span> - штрафное время,</li>
            <li><span>ШР</span> - шайбы в равенстве,</li>
        </ul>
    </div>
    <div class="col-lg-4 no-padding">
        <ul>
            <li><span>ШБ</span> - шайбы в большинстве,</li>
            <li><span>ШМ</span> - шайбы в меньшинстве,</li>
            <li><span>ШО</span> - шайбы в овертайме,</li>
            <li><span>ШП</span> - победные шайбы,</li>
            <li><span>РБ</span> - решающие буллиты,</li>
            <li><span>БВ</span> - броски по воротам,</li>
            <li><span>%БВ</span> - процент реализованных <br>бросков,</li>
        </ul>
    </div>
    <div class="col-lg-4 no-padding">
        <ul>
            <li><span>БВ/И</span> - среднее количество бросков по <br>воротам за игру,</li>
            <li><span>ВБР</span> - вбрасывания,</li>
            <li><span>ВВБР</span> - выигранные вбрасывания,</li>
            <li><span>%ВБР</span> - процент выигранных вбрасываний,</li>
            <li><span>ВП/И</span> - среднее время на площадке за игру,</li>
            <li><span>СМ/И</span> - среднее количество смен за игру</li>
        </ul>
    </div>
</div>


