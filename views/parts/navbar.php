<?php
/**
 * Created by PhpStorm.
 * User: User-9
 * Date: 16.10.2017
 * Time: 16:15
 */
Use yii\helpers\Url;
?>

<!-- START HEADER -->



<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="<?=Yii::$app->homeUrl ?>"><img src="/images/partnership.png" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="<?=Yii::$app->homeUrl ?>"><img src="/images/partnership-mini-(2).png" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
<!--        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>-->
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-lg-block">
                <a class="nav-link" href="<?= Url::toRoute(['/profile/update','id'=>Yii::$app->user->id]);?>">
                    <i class="mdi mdi-settings" data-toggle="tooltip" data-placement="top"  title="Settings"></i>
                </a>
            </li>
            <li class="nav-item d-lg-block">
                <a class="nav-link" href="<?= Url::to(['/auth/logout']) ?>">
                    <i class="mdi mdi-exit-to-app"  data-toggle="tooltip" data-placement="top"  title="Logout"></i>
                </a>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>