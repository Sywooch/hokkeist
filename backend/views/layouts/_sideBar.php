<?php

use siasoft\coloradmin\widgets\SideBar;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
?>

<div id="sidebar" class="sidebar sidebar-grid">
    <div data-scrollbar="true" data-height="100%">

        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a title="Посмотреть свой профиль" href="<?= Url::to(['user/view', 'id' => Yii::$app->user->identity->id]); ?>"><img src="/admin/assets/img/user-11.jpg" alt="" /></a>
                </div>
                <div class="info">
                    <?= Yii::$app->user->identity->first_name . ' ' . Yii::$app->user->identity->last_name ?>
                    <small>Администратор</small>
                </div>
            </li>
        </ul>
        <!-- end sidebar user -->

        <?php
        SideBar::begin();
        
        require_once '_sideBarItems.php';
        
        echo SideBar::widget([
            'options' => ['class' => ''],
            'items' => $menuItems,
        ]);
        SideBar::end();
        ?>
    </div>
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->