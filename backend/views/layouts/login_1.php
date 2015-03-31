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

        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link href="http://seantheme.com/color-admin-v1.6/admin/html/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="http://seantheme.com/color-admin-v1.6/admin/html/assets/css/animate.min.css" rel="stylesheet" />
        <link href="http://seantheme.com/color-admin-v1.6/admin/html/assets/css/style.min.css" rel="stylesheet" />
        <!-- ================== END BASE CSS STYLE ================== -->
        <link href='http://fonts.googleapis.com/css?family=Exo+2:400,700,500,300&amp;subset=latin,cyrillic' rel='stylesheet' type='text/css'>

    </head>
    <style>
        body {
            /*background: url(http://hck.siasoft.ru/bitrix/templates/tamplate_main_page/img/main/sun-lights-1.png) no-repeat scroll center top #364674;*/
            margin-bottom: -190px;
            color: #707478;
        }
        .bg-black {
            background-color: #707478;
        }
        .login .login-header {
            font-weight: 300;
            left: 50%;
            margin-left: -225px;
            padding: 0 40px;
            position: absolute;
            right: 0;
            top: -190px;
            width: 450px;
        }
        h1.logo {
           
            font-size: 16px;
            text-align: center;
            font-family: "Exo 2",sans-serif;
            text-transform: uppercase;
        }
        .login {
            margin: 190px 0;
        }
        .bg-black {
            background: url(http://hck.siasoft.ru/bitrix/templates/tamplate_main_page/img/main/sun-lights-1.png) no-repeat scroll center top #364674;
        }
    </style>
    <body>
        <?php $this->beginBody() ?>

        <!-- begin #page-container -->
        <div id="page-container">
            <!-- begin login -->
            <div class="login bg-black animated fadeInDown">
                <!-- begin brand -->
                <div class="login-header">
                    <h1 class="logo">
                        <img src="http://hck.siasoft.ru/bitrix/templates/tamplate_main_page/img/main/logo.png" style="width:120px;"> 
                        <span style="display:block; margin: 15px 0 ;">
                            Федерация хоккея с шайбой 
                            ХМАО-Югры</span>
                    </h1>
                </div>
                <!-- end brand -->
                <div class="login-content">
                    <form action="index.html" method="POST" class="margin-bottom-0">
                        <div class="form-group m-b-20">
                            <input type="text" class="form-control input-lg" placeholder="Email Address" />
                        </div>
                        <div class="form-group m-b-20">
                            <input type="text" class="form-control input-lg" placeholder="Password" />
                        </div>
                        <div class="checkbox m-b-20">
                            <label>
                                <input type="checkbox" /> Remember Me
                            </label>
                        </div>
                        <div class="login-buttons">
                            <button type="submit" class="btn btn-success btn-block btn-lg">Sign me in</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end login -->


        </div>
        <!-- end page container -->

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
