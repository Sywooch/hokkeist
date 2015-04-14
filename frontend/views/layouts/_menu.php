<?php

use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

NavBar::begin([
    'brandLabel' => false,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => '',
    ],
]);
$category = Yii::$app->controller->actionParams['category'];
$controller = Yii::$app->controller->id;

$menuItems = [
    ['label' => 'Новости', 'url' => ['/article/index', 'category' => 'news'], 'active' => 'news' === $category],
    ['label' => 'История', 'url' => ['/article/index', 'category' => 'history'], 'active' => 'history' === $category],
    ['label' => 'Официально', 'url' => ['/site/about'], 'active' => 'about' === $category, 'items' => [
            ['label' => 'О федерации', 'url' => ['/article/single', 'category' => 'about'], 'active' => 'about' === $category],
            ['label' => 'Руководство', 'url' => ['/article/single', 'category' => 'leadership'], 'active' => 'leadership' === $category],
            ['label' => 'Контакты', 'url' => ['/article/single', 'category' => 'contacts'], 'active' => 'contacts' === $category],
        ]],
    ['label' => 'Соревнования', 'url' => ['/competition/'], 'active' => 'competition' === $controller],
    ['label' => 'Игроки', 'url' => ['/player/'], 'active' => 'player' === $controller],
    ['label' => 'Клубы', 'url' => ['/team/'], 'active' => 'team' === $controller],
    ['label' => 'Статистика', 'url' => ['/statistic/'], 'active' => 'statistic' === $controller],
    ['label' => 'Медиа', 'url' => ['/site/media'], 'active' => 'media' === $controller],
];
echo Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => $menuItems,
]);
NavBar::end();
