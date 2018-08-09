<?php
/**
 * Created by PhpStorm.
 * User: User-9
 * Date: 16.10.2017
 * Time: 16:15
 */
use digitv\bootstrap\Html;
use digitv\bootstrap\widgets\Nav;
use digitv\bootstrap\widgets\NavBar;
Use yii\helpers\Url;
?>

<!-- START HEADER -->



<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="<?=Yii::$app->homeUrl ?>"><img src="/images/partnership.png" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="<?=Yii::$app->homeUrl ?>"><img src="/images/partnership-mini.png" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-lg-block">
                <a class="nav-link" href="<?= Url::toRoute(['/settings']);?>">
                    <i class="mdi mdi-settings" data-toggle="tooltip" data-placement="top"  title="<?= Yii::t('app','Settings') ?>"></i>
                </a>
            </li>
            <li class="nav-item d-lg-block">
                <form action="<?= Url::to(['/auth/logout']) ?>" method="post">
                    <input type="hidden" name="_csrf" value="_wAzdAh-0C6Tc6B-BBVePj7o3kbXs5F9t5a18dWGu1q1aQZDX0uGTaZKzBcpbwZwaq_oGYfZ9C_P_9mi5LHREQ==">
                    <button type="submit" class="btn btn-link nav-link" formmethod="post" value="<?= Url::to(['/auth/logout']) ?>">
                        <i class="mdi mdi-exit-to-app"  data-toggle="tooltip" data-placement="top"  title="<?= Yii::t('app','Logout') ?>"></i>
                    </button>
                </form>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>

