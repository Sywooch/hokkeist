<?php
$this->title = !$_GET['text'] ? "Поиск по сайту" : 'Результаты поиска';
?>
<div id='search-result'>
    <h1><?= $this->title ?></h1>
    <input class='search-input' type="text" value="<?= $_GET['text'] ?>" /><br />
    <!--<input type='submit' value="Искать" >-->
    <?php if (!$_GET['text']): ?>
        <p>Не введен текст поиска</p>
        <?php
    else:
        switch ($target) {
            case 'player':
                echo yii\helpers\Html::tag('h2', 'Поиск по игрокам <small>Найдено ' . count($model) . '</small>');
                for ($i = 0; $i < count($model); $i++)
                    echo $this->render('_player', ['model' => $model[$i], 'i' => $i]);
                break;

            default:
                break;
        }
    endif;
    ?>
</div>