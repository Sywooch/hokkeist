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
$menuItems = [
    ['label' => 'Новости', 'url' => ['/article/index', 'category' => 'news'], 'active' => 'news' === $category],
    ['label' => 'История', 'url' => ['/article/index', 'category' => 'history'], 'active' => 'history' === $category],
    ['label' => 'Официально', 'url' => ['/site/about'], 'active' => 'about' === $category, 'items' => [
            ['label' => 'О федерации', 'url' => ['/site/about'], 'active' => 'history' === $category],
            ['label' => 'Руководство', 'url' => ['/site/leadership'], 'active' => 'leadership' === $category],
            ['label' => 'Контакты', 'url' => ['/site/contacts'], 'active' => 'contacts' === $category],
        ]],
    ['label' => 'Соревнования', 'url' => ['/competition/']],
    ['label' => 'Игроки', 'url' => ['/player/']],
    ['label' => 'Клубы', 'url' => ['/team/']],
    ['label' => 'Статистика', 'url' => ['/statistic/']],
    ['label' => 'Медиа', 'url' => ['/site/media'], 'active' => 'media' === $category],
];
echo Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => $menuItems,
]);
NavBar::end();
