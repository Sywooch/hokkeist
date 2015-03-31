<?php

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => 'ФХ ХМАО',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Главная', 'url' => ['/site/index']],
                ['label' => 'Команды', 'url' => ['/site/index']],
                ['label' => 'Игроки', 'url' => ['/player/index'], 'items' => [
                        ['label' => 'Игроки', 'url' => ['/player/index']],
                        ['label' => 'Игроки дивизионов', 'url' => ['/player/index']],
                    ]],
                ['label' => 'Соревнования', 'url' => ['/site/index']],
                ['label' => 'Справочники', 'url' => ['/player/index'], 'items' => [
                        ['label' => 'Стадионы', 'url' => ['/player/index']],
                        ['label' => 'Организации', 'url' => ['/player/index']],
                        ['label' => 'Пользователи', 'url' => ['/user/index']],
                        ['label' => 'Города', 'url' => ['/player/index']],
                    ]],
                ['label' => 'Статьи', 'url' => ['/player/index'], 'items' => [
                        ['label' => 'Новости', 'url' => ['/player/index']],
                        ['label' => 'Статичные страницы', 'url' => ['/player/index']],
                    ]],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Выход (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
