<?php

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Alert;
use yii\helpers\Url;

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
        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
        <!-- ================== END BASE CSS STYLE ================== -->
    </head>
    <body>
        <?php $this->beginBody() ?>
        <!-- begin #page-loader -->
        <div id="page-loader" class="fade"><span class="spinner"></span></div>
        <!-- end #page-loader -->

        <!-- begin #page-container -->
        <div id="page-container" class="fade  in page-sidebar-fixed page-header-fixed">
            <!-- begin #header -->
            <div id="header" class="header navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                    <!-- begin mobile sidebar expand / collapse button -->
                    <div class="navbar-header">
                        <a href="javascript:;" class="navbar-brand"><img style="max-height: 100%;" src="/admin/images/qucms.png" alt="qucms logo"/></a>
                        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- end mobile sidebar expand / collapse button -->

                    <!-- begin header navigation right -->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <form class="navbar-form full-width hidden-xs">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Текст для поиска" />
                                    <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </li>
<!--                        <li class="dropdown">
                            <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
                                <i class="fa fa-bell-o"></i>
                                <span class="label">5</span>
                            </a>
                            <ul class="dropdown-menu media-list pull-right animated fadeInDown">
                                <li class="dropdown-header">Notifications (5)</li>
                                <li class="media">
                                    <a href="javascript:;">
                                        <div class="pull-left media-object bg-red"><i class="fa fa-bug"></i></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Server Error Reports</h6>
                                            <div class="text-muted">3 minutes ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="media">
                                    <a href="javascript:;">
                                        <div class="pull-left"><img src="/assets/img/user-11.jpg" class="media-object" alt="" /></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">John Smith</h6>
                                            <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                            <div class="text-muted">25 minutes ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="media">
                                    <a href="javascript:;">
                                        <div class="pull-left"><img src="assets/img/user-2.jpg" class="media-object" alt="" /></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Olivia</h6>
                                            <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                            <div class="text-muted">35 minutes ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="media">
                                    <a href="javascript:;">
                                        <div class="pull-left media-object bg-green"><i class="fa fa-plus"></i></div>
                                        <div class="media-body">
                                            <h6 class="media-heading"> New User Registered</h6>
                                            <div class="text-muted">1 hour ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="media">
                                    <a href="javascript:;">
                                        <div class="pull-left media-object bg-blue"><i class="fa fa-envelope"></i></div>
                                        <div class="media-body">
                                            <h6 class="media-heading"> New Email From John</h6>
                                            <div class="text-muted">2 hour ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-footer text-center">
                                    <a href="javascript:;">View more</a>
                                </li>
                            </ul>
                        </li>-->
                        <li class="dropdown navbar-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/admin/assets/img/user-11.jpg" alt="" />
                                <span class="hidden-xs"><?= Yii::$app->user->identity->username ?></span> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu animated fadeInLeft">
                                <li class="arrow"></li>
                                <li><a href="<?= Url::to(['user/update', 'id' => Yii::$app->user->identity->id]); ?>">Редактировать профиль</a></li>
                                <!--<li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Входящие</a></li>-->
                                <!--<li><a href="javascript:;">Настройки</a></li>-->
                                <li class="divider"></li>
                                <li><a href="<?= Url::to(['site/logout']); ?>">Выход</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- end header navigation right -->
                </div>
            </div>
            <!-- end #header -->

            <!-- begin #menu -->
            <?php require_once '_sideBar.php'; ?>

            <!-- begin #content -->
            <div id="content" class="content">

                <?=
                (Yii::$app->session->hasFlash('error')) ? Alert::widget([
                            'options' => [
                                'class' => 'alert-danger',
                            ],
                            'body' => Yii::$app->session->getFlash('error'),
                        ]) : '';
                ?>
                <!-- begin page-header -->
                <?= $content ?>
                <!-- end page-header -->
                <!-- Page Content Here -->
            </div>
            <!-- end #content -->
            <!-- begin scroll to top btn -->
            <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top">
                <i class="fa fa-angle-up"></i>
            </a>
            <!-- end scroll to top btn -->
        </div>
        <!-- end page container -->

        <div class="footer" id="footer">
            &copy; 2014 QuCMS - система управления сайтом от <?= Html::a('Siasoft.ru', '//siasoft.ru', ['target' => '_blank']) ?>
        </div>

        <?php $this->endBody() ?>
        <script>
            $(document).ready(function () {
                App.init();
                Dashboard.init();
            });
        </script>
    </body>
</html>
<?php $this->endPage() ?>
