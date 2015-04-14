<?php

use yii\helpers\Html;

$c = $_GET['c'];
$chars = array('a', 'б', 'в', 'г', 'д', 'е', 'ж', 'з', 'и', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'э', 'ю', 'я');
?>
<div id="player-search-panel">
    <div class="col-xs-9">
        <ul>
            <li>
                <a class='<?= empty($c) ? "active" : "" ?>' href='<?= \yii\helpers\Url::to(['player/index']) ?>'>Все</a>
            </li>
            <?php
            foreach ($chars as $char) {
                echo Html::tag('li', Html::a($char, '?c=' . $char, ['class' => $c == $char ? 'active' : '']));
            }
            ?>
        </ul>
    </div>
    <div class="col-xs-3 no-padding">
        <div></div>
    </div>
</div>