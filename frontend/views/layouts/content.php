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
    <?php require '_head.php'; ?>
    <body>
        <?php $this->beginBody() ?>

        <div class="row" id="top-menu-container">
            <div id="top-menu" class="container">
                <?php require_once '_menu.php'; ?>
            </div>
        </div>

        <?php require '_header.php'; ?>
        <?= frontend\widgets\TournaimentBlock::widget(['options' => ['visible' => false]]) ?>

        <div class="row sun-light-1">
            <div class="container" style="padding-left:0; padding-right: 0;">
                <div class="col-lg-9 no-padding content-container">
                    <?= $content ?>
                </div>
                <div class="col-lg-3 no-padding">
                    <?php require_once '_rightBlock.php'; ?>
                </div>
            </div>
        </div>

        <?php require_once '_partners.php'; ?>
        <?php require_once '_footerMenu.php'; ?>
        <?php require_once '_footer.php'; ?>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
