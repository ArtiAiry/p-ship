<?php

/* @var $this yii\web\View */

use yii\bootstrap\Html;
use yii\helpers\Url;

$this->title = 'Profituz';
?>
<div class="site-index">

    <div class="grid-margin stretch-card" id="welcome-component">
        <div class="card bg-dark text-white">
            <img class="card-img" src="/images/main-menu/site-bg-wide.png" alt="Card image">
            <div class="card-img-overlay h-100 d-flex flex-column justify-content-end main">
                <h5 class="card-title"><?= Yii::t('start', 'Welcome') ?>, <?= Yii::$app->user->identity->username ?>!</h5>
                <p class="card-text"><?= Yii::t('start', 'This is a start point for our further partnership. We hope, that this program will be comfortable for you.') ?></p>
                <p class="card-text">"Partnership" team.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card custom bg-dark text-white" style="width: 18rem;">
                <div class="zoom img-overlay">
                    <img class="card-img-top" src="/images/main-menu/site-bg-product.png" alt="Card image cap">
                    <a href="<?= Url::toRoute(['/product']); ?>">
                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end main">
                            <h5 class="card-title"><?= Yii::t('start', 'Products') ?></h5>
                            <p class="card-text"><?= Yii::t('start', 'Here you are able to view all products and copy product\'s referral link.') ?></p>
                        </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card custom bg-dark text-white" style="width: 18rem;">
                <div class="zoom img-overlay">
                    <img class="card-img-top" src="/images/main-menu/site-bg-statistics.png" alt="Card image cap">
                    <a href="<?= Url::to(['/statistics']) ?>">
                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end main">
                            <h5 class="card-title"><?= Yii::t('start', 'Statistics') ?></h5>
                            <p class="card-text"><?= Yii::t('start', 'Here you are able to view all details of your progress.') ?></p>
                        </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card custom bg-dark text-white" style="width: 18rem;">
                <div class="zoom img-overlay">
                    <img class="card-img-top" src="/images/main-menu/site-bg-profile.png" alt="Card image cap">
                    <a href="<?= Url::toRoute(['/settings']);?>">
                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end main">
                            <h5 class="card-title"><?= Yii::t('start', 'Your Profile - your cabinet') ?></h5>
                            <p class="card-text"><?= Yii::t('start', 'In Your Profile Settings you can edit your info, sources and etc.') ?></p>
                        </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card custom bg-dark text-white" style="width: 18rem;">
                <div class="zoom img-overlay">
                    <img class="card-img-top" src="/images/main-menu/site-bg-wallet.png" alt="Card image cap">
                    <a href="<?= Url::toRoute(['/settings/wallet']); ?>">
                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end main">
                            <h5 class="card-title"><?= Yii::t('start', 'Wallet Settings') ?></h5>
                            <p class="card-text"><?= Yii::t('start', 'In Your Wallet Settings you can change your main wallet and requisites.') ?></p>
                        </div>
                </div>
            </div>
            </a>
        </div>
    </div>
</div>
