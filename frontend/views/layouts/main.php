<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

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

        <link href='http://fonts.googleapis.com/css?family=Exo+2:400,700,500,300&amp;subset=latin,cyrillic' rel='stylesheet' type='text/css'>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <?php require '_header.php'; ?>
        <div class="row" id="top-menu-container">
            <div id="top-menu" class="container">
                <?php
                NavBar::begin([
                    'brandLabel' => false,
                    'brandUrl' => Yii::$app->homeUrl,
                    'options' => [
                        'class' => '',
                    ],
                ]);
                $menuItems = [
                    ['label' => 'Новости', 'url' => ['/article/index','category' => 'news'], 'active' => 'news' === Yii::$app->controller->actionParams['category']],
                    ['label' => 'История', 'url' => ['/article/index','category' => 'history']],
                    ['label' => 'Официально', 'url' => ['/site/about'], 'items' => [
                            ['label' => 'О федерации', 'url' => ['/site/index']],
                            ['label' => 'Руководство', 'url' => ['/site/about']],
                            ['label' => 'Контакты', 'url' => ['/site/about']],
                        ]],
                    ['label' => 'Соревнования', 'url' => ['/competition/']],
                    ['label' => 'Игроки', 'url' => ['/player/']],
                    ['label' => 'Клубы', 'url' => ['/team/']],
                    ['label' => 'Статистика', 'url' => ['/statistic/']],
                    ['label' => 'Медиа', 'url' => ['/site/media']],
                ];
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav'],
                    'items' => $menuItems,
                ]);
                NavBar::end();
                ?>


            </div>
        </div>


        <div class="row" id="header-container">
            <div id="header" class="container">
                <div class="col-lg-2">
                    <a href="/" title="На главную">
                        <img src="/img/main/logo.png" alt="Логотип Федерации хрккея с шайбой ХМАО-Югры" height="117" width="117"></a>
                </div>
                <div class="col-lg-6" id="logo-title">
                    <p>Региональная общественная организация</p>
                    <p style="padding-left:4px;">Федерация хоккея с шайбой</p>
                    <p>Ханты-Мансийского Автономного округа-Югры</p>
                </div>
                <div id="reg" class="col-lg-4">
                    <div class="col-lg-8">
                        <input type="button" value="Регистрация" class="button" data-type="zoomout-reg" />
                    </div>
                    <div class="col-lg-4">
                        <input type="button" value="Вход" class="button" data-type="zoomout-login" />
                    </div>
                </div>
            </div>
            <div id="header-hr-line"></div>
        </div>
        <div class="overlay-container"></div>
        <div class="window-container zoomout-reg">
            <div id="registration"> 
                <legend>Форма регистрации</legend>
                <form action="#" method="POST" role="form">
                    <div class="form-reg-login">
                        <input type="text" id="name" placeholder="Имя">
                        <input type="text" id="email" placeholder="E-mail">
                        <input type="text" id="password1" placeholder="Пароль">
                        <input type="text" id="login" placeholder="Псевдоним">
                        <input type="text" id="sity" placeholder="Город">
                        <input id="personal-info" type="checkbox" hidden="" checked="" value="v1">
                        <label for="personal-info">Согласен на обработку <ins>персональных данных</ins></label>
                    </div>
                    <button type="submit" class="form-reg-login-btn">Отправить</button>
                </form>
                <a class="close" title="Закрыть" href="#close">x</a>
            </div>
        </div>
        <div class="window-container zoomout-login">
            <div id="authorize">
                <legend>Вход</legend>
                <form action="#" method="POST" role="form">
                    <div class="form-reg-login">
                        <input type="text" id="name-login" placeholder="Имя или E-mail">
                        <input type="text" id="password2" placeholder="Пароль">
                        <input id="remember-me" type="checkbox" hidden="" checked="" value="v2">
                        <label for="remember-me">Запомнить меня</label>
                    </div>
                    <button type="submit" class="form-reg-login-btn">Войти</button>
                </form>
                <a class="close" title="Закрыть" href="#close">x</a>
            </div>  
        </div>
        <div class="row" id="tournaiment-container">
            <div class="container  naw-buttons-here" style="position: relative">
                <div id="carousel-1" class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="item-inner">
                            <div class="date">20.04.2014, Вс</div>
                            <a href="#" class="tour-table-1">
                                <img src="/img/lokomotiv.png" height="50" width="50" alt="">
                                <p>Локомотив</p>
                            </a>
                            <div class="score">14 : 5</div>
                            <a href="#" class="tour-table-2">
                                <img src="/img/omsk.yastreb.png" height="50" width="50" alt="">
                                <p>
                                    Омские
                                    <br>Ястребы</p>
                            </a>
                            <div class="hr-carousel-1"></div>
                            <div class="show-tournaiment-result">
                                <a href="#">Смотреть турнирную таблицу</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-inner">
                            <div class="date">20.04.2014, Вс</div>
                            <div class="tour-table-1">
                                <img src="/img/lokomotiv.png" height="50" width="50" alt="">
                                <p>Локомотив</p>
                            </div>
                            <div class="score">14 : 5</div>
                            <div class="tour-table-2">
                                <img src="/img/omsk.yastreb.png" height="50" width="50" alt="">
                                <p>
                                    Омские
                                    <br>Ястребы</p>
                            </div>
                            <div class="hr-carousel-1"></div>
                            <div class="show-tournaiment-result">
                                <a href="#">Смотреть турнирную таблицу</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-inner">
                            <div class="date">20.04.2014, Вс</div>
                            <div class="tour-table-1">
                                <img src="/img/lokomotiv.png" height="50" width="50" alt="">
                                <p>Локомотив</p>
                            </div>
                            <div class="score">14 : 5</div>
                            <div class="tour-table-2">
                                <img src="/img/omsk.yastreb.png" height="50" width="50" alt="">
                                <p>
                                    Омские
                                    <br>Ястребы</p>
                            </div>
                            <div class="hr-carousel-1"></div>
                            <div class="show-tournaiment-result">
                                <a href="#">Смотреть турнирную таблицу</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item-inner">
                            <div class="date">20.04.2014, Вс</div>
                            <div class="tour-table-1">
                                <img src="/img/lokomotiv.png" height="50" width="50" alt="">
                                <p>Локомотив</p>
                            </div>
                            <div class="score">14 : 5</div>
                            <div class="tour-table-2">
                                <img src="/img/omsk.yastreb.png" height="50" width="50" alt="">
                                <p>
                                    Омские
                                    <br>Ястребы</p>
                            </div>
                            <div class="hr-carousel-1"></div>
                            <div class="show-tournaiment-result">
                                <a href="#">Смотреть турнирную таблицу</a>
                            </div>
                        </div>
                    </div>
                    <!--  <div class="item">
                    <div class="item-inner">
                        <div class="date">20.04.2014, Вс</div>
                        <div class="tour-table-1">
                            <img src="/img/lokomotiv.png" height="50" width="50" alt="">
                            <p>Локомотив</p>
                        </div>
                        <div class="score">14 : 5</div>
                        <div class="tour-table-2">
                            <img src="/img/omsk.yastreb.png" height="50" width="50" alt="">
                            <p>
                                Омские
                                <br>Ястребы</p>
                        </div>
                        <div class="hr-carousel-1"></div>
                        <div class="show-tournaiment-result">
                            <a href="#">Смотреть турнирную таблицу</a>
                        </div>
                    </div>
                </div>
                    -->
                </div>
            </div>
        </div>

        <!-- center -->
        <div class="row sun-light-1">
            <div class="container" style="padding-left:0; padding-right: 0;">
                <div class="col-lg-9 no-padding">
                    <?= $content ?>
                </div>

                <div class="col-lg-3 no-padding">
                    <div class="widget clearfix">
                        <div id="simple-search">
                            <div class="hr-min-top"></div>
                            <h3>Простой поиск</h3>
                            <div id="hr-review-search"></div>

                            <input type="text" placeholder="Что будем искать">

                            <button type="submit" id="find-btm" >Найти</button>
                            <a class="find-cat-btm" href="">По клубам</a>
                            <a class="find-cat-btm" href="">По игрокам</a>
                            <a class="find-cat-btm" href="">По новостям</a>
                            <div class="hr-min-bottom"></div>
                        </div>
                    </div>

                    <div class="widget clearfix">
                        <div id="calendar">
                            <div id="calendar-blick"></div>
                            <div class="hr-min-top"></div>
                            <div id="calendar-date">
                                <a href="">
                                    <div class="calendar-prev"></div>
                                </a>
                                <p>2 сентября</p>
                                <a href="">
                                    <div class="calendar-next"></div>
                                </a>
                            </div>
                            <div id="calendar-month">
                                <a class="calendar-close" href=""></a>
                                <div class="col-lg-12">
                                    <a class="match-table-1" href="">
                                        <img src="/img/lokom.jpg" height="39" width="39" alt="">
                                        <p>Локомотив</p>
                                    </a>
                                    <p class="dash">-</p>
                                    <a class="match-table-2" href="">
                                        <img src="/img/omsk-yastr.jpg" height="41" width="42" alt="">
                                        <p>
                                            Омские
                                            <br>Ястребы</p>
                                    </a>
                                </div>
                                <div class="col-lg-12">
                                    <a class="match-table-1" href="">
                                        <img src="/img/lokom.jpg" height="39" width="39" alt="">
                                        <p>Локомотив</p>
                                    </a>
                                    <p class="dash">-</p>
                                    <a class="match-table-2" href="">
                                        <img src="/img/omsk-yastr.jpg" height="41" width="42" alt="">
                                        <p>
                                            Омские
                                            <br>Ястребы</p>
                                    </a>
                                </div>
                            </div>
                            <div class="hr-min-bottom"></div>
                        </div>
                    </div>
                    <div class="widget clearfix">
                        <div id="ticket" class="col-lg-12">
                            <div class="hr-min-top"></div>
                            <a href="#">
                                <span>Купить билет</span>
                                <span>На матч</span>
                            </a>
                            <div class="hr-min-bottom"></div>
                        </div>
                    </div>

                    <div class="widget clearfix">
                        <div class="col-lg-2" id="subscribe-form">
                            <div class="hr-min-top"></div>
                            <h3>Подпишись!</h3>
                            <span id="subtitle">И узнавай все первым</span>
                            <div class="hr-foto-video"></div>
                            <form method="post" action="#">
                                <p>
                                    <input type="checkbox" id="option1" value="1" hidden>
                                    <label for="option1">На новости</label>
                                </p>
                                <p>
                                    <input type="checkbox" id="option2" value="a2" hidden  checked>
                                    <label for="option2">На предстоящие турниры</label>
                                </p>
                                <div class="hr-foto-video"></div>
                                <input id="email-inpt" type="text" placeholder="ivanov@example.com">
                                <div>
                                    <a href="#" id="subscribe-btm">Подписаться</a>
                                </div>
                            </form>
                            <div class="hr-min-bottom"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="carousel-box-2">
            <div class="container">
                <div id="carousel-2" class="owl-carousel owl-theme">
                    <div class="item">
                        <a href="http://ugra-hc.ru/">
                            <img src="/img/ugra.png" height="159" width="150" alt="Хоккейный клуб Югра"></a>
                    </div>
                    <div class="item">
                        <a href="http://fhr.ru/">
                            <img src="/img/fhr.png" height="159" width="150" alt="Федерация хоккея России"></a>
                    </div>
                    <div class="item">
                        <a href="http://avangard-ugra.ucoz.ru/">
                            <img src="/img/avangard.png" height="159" width="150" alt="Авангард-Югра"></a>
                    </div>
                    <div class="item">
                        <a href="http://www.uralhockey.ru/">
                            <img src="/img/mks.png" height="159" width="150" alt="МКС Урал-Западная Сибирь"></a>
                    </div>
                    <div class="item">
                        <a href="http://www.khl.ru/">
                            <img src="/img/khl.png" height="159" width="150" alt="Континентальная Хоккейная Лига"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- // center -->
        <div class="row sun-light-1">
            <div id="col-5-footer" class="container">
                <div class="col-lg-2">
                    <h3>Судейство</h3>
                    <ul>
                        <li>
                            <a href="">Интернет-магазин</a>
                        </li>
                        <li>
                            <a href="">Видеотрансляции</a>
                        </li>
                        <li>
                            <a href="">Текстовые трансляции</a>
                        </li>
                        <li>
                            <a href="">Заказ билетов</a>
                        </li>
                        <li>
                            <a href="">Фотобанк</a>
                        </li>
                        <li>
                            <a href="">Телеканал КХЛ</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h3>Клубы</h3>
                    <ul>
                        <li>
                            <a href="">Интернет-магазин</a>
                        </li>
                        <li>
                            <a href="">Видеотрансляции</a>
                        </li>
                        <li>
                            <a href="">Текстовые трансляции</a>
                        </li>
                        <li>
                            <a href="">Заказ билетов</a>
                        </li>
                        <li>
                            <a href="">Фотобанк</a>
                        </li>
                        <li>
                            <a href="">Телеканал КХЛ</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h3>Социальные сети</h3>
                    <ul>
                        <li>
                            <a href="">Интернет-магазин</a>
                        </li>
                        <li>
                            <a href="">Видеотрансляции</a>
                        </li>
                        <li>
                            <a href="">Текстовые трансляции</a>
                        </li>
                        <li>
                            <a href="">Заказ билетов</a>
                        </li>
                        <li>
                            <a href="">Фотобанк</a>
                        </li>
                        <li>
                            <a href="">Телеканал КХЛ</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h3>Размещение рекламы</h3>
                    <ul>
                        <li>
                            <a href="">Интернет-магазин</a>
                        </li>
                        <li>
                            <a href="">Видеотрансляции</a>
                        </li>
                        <li>
                            <a href="">Текстовые трансляции</a>
                        </li>
                        <li>
                            <a href="">Заказ билетов</a>
                        </li>
                        <li>
                            <a href="">Фотобанк</a>
                        </li>
                        <li>
                            <a href="">Телеканал КХЛ</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h3>Контакты</h3>
                    <ul>
                        <li>
                            <a href="">Интернет-магазин</a>
                        </li>
                        <li>
                            <a href="">Видеотрансляции</a>
                        </li>
                        <li>
                            <a href="">Текстовые трансляции</a>
                        </li>
                        <li>
                            <a href="">Заказ билетов</a>
                        </li>
                        <li>
                            <a href="">Фотобанк</a>
                        </li>
                        <li>
                            <a href="">Телеканал КХЛ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div id="hr-footer"></div>
            </div>
        </div>
        <footer>
            <div class="container">
                <div class="col-lg-6">© Федерация хоккея с шайбой 2014. Все права защищены.</div>
                <div class="col-lg-3" id="social-footer-link">
                    <a class="soc-links rss" href="#"></a>
                    <a class="soc-links fb" href="#"></a>
                    <a class="soc-links vk" href="#"></a>
                </div>
                <div class="col-lg-3 text-right">
                    <!--<div class="row">-->
                    <!--<div class="col-xs-6">-->
                        <!--<p>Работает на <br /><a href="#">QuCMS</a></p>-->
                    <!--</div>-->
                    <!--<div class="col-xs-6">-->
                    <a title="Разработка и поддержка сайта - СИАСОФТ" href="//siasoft.ru" target="_blank">
                        <img src="//siasoft.ru/img/siasoft_small.png" alt="Сиасофт" />
                    </a>
                    <!--</div>-->
                </div>


            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
