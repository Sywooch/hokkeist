<?php
$menuItems = [
    ['label' => 'Главная', 'url' => ['/site/index'], 'icon' => 'laptop'],
    '<li class="nav-header">Игры</li>',
    ['label' => 'Команды', 'url' => ['/team/index'], 'icon' => 'users', 'active' => 'team' === Yii::$app->controller->id],
//    ['label' => 'Команды', 'url' => 'javascript:;', 'icon' => 'users', 'items' => [
//            ['label' => 'Команды', 'url' => ['/team/index'], 'active' => 'team' === Yii::$app->controller->id],
//            ['label' => 'Команды дивизионов', 'url' => ['/player/index3']],
//        ]],
    ['label' => 'Игроки', 'icon' => 'user','url' => ['/player/index'], 'active' => 'player' === Yii::$app->controller->id],
    ['label' => 'Матчи', 'url' => ['/match/index'], 'icon' => 'cubes', 'active' => 'macth' === Yii::$app->controller->id],
    ['label' => 'Туры', 'url' => ['/tour/index'], 'icon' => 'cubes', 'active' => 'tour' === Yii::$app->controller->id],
    ['label' => 'Этапы', 'url' => ['/stage/index'], 'icon' => 'cubes', 'active' => 'stage' === Yii::$app->controller->id],
    ['label' => 'Дивизионы', 'url' => ['/division/index'], 'icon' => 'cubes', 'active' => 'division' === Yii::$app->controller->id],
    ['label' => 'Соревнования', 'url' => ['/competition/index'], 'icon' => 'cubes', 'active' => 'competition' === Yii::$app->controller->id],
    ['label' => 'Сезоны', 'url' => ['/season/index'], 'icon' => 'cubes','active' => 'season' === Yii::$app->controller->id],
//    ['label' => 'Соревнования', 'url' => 'javascript:;', 'icon' => 'cubes', 'items' => [
//            ['label' => 'Соревнования', 'url' => ['/competition/index'], 'active' => 'competition' === Yii::$app->controller->id],
//            ['label' => 'Календарь игр', 'url' => 'javascript:;', 'icon' => 'laptop'],
//            ['label' => 'Турнирная таблица', 'url' => 'javascript:;', 'icon' => 'laptop'],
//        ]],
    ['label' => 'Статистика', 'url' => 'javascript:;', 'icon' => 'bolt'],
    ['label' => 'Судьи', 'url' => 'javascript:;', 'icon' => 'bullhorn'],
    '<li class="nav-header">Контент и наполнение</li>',
    ['label' => 'Справочники', 'icon' => 'book ', 'url' => 'javascript:;', 'items' => [
            
            ['label' => 'Стадионы', 'url' => ['/stadium/index'], 'active' => 'stadium' === Yii::$app->controller->id],
            ['label' => 'Организации', 'url' => ['/organization/index'], 'active' => 'organization' === Yii::$app->controller->id],
            ['label' => 'Города', 'url' => ['/city/index'], 'active' => 'city' === Yii::$app->controller->id],
            ['label' => 'Пользователи', 'url' => ['/user/index'], 'active' => 'user' === Yii::$app->controller->id],
        ]],
    ['label' => 'Контентные страницы', 'url' => 'javascript:;', 'icon' => 'file-text', 'items' => [
            ['label' => 'Новости', 'url' => 'javascript:;', 'icon' => 'laptop'],
            ['label' => 'Официально', 'url' => 'javascript:;', 'icon' => 'laptop'],
            ['label' => 'Документы', 'url' => 'javascript:;', 'icon' => 'laptop'],
            ['label' => 'Видеоархив', 'url' => ['/player/index1']],
            ['label' => 'Фотоархив', 'url' => ['/player/inde2x']],
            ['label' => 'История', 'url' => ['/player/index3']],
            ['label' => 'Контакты', 'url' => ['/player/index4']],
            ['label' => 'Обращение', 'url' => ['/player/index5']],
        ]],
    '<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>',
];
