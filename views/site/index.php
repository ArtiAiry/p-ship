<?php

/* @var $this yii\web\View */

use yii\bootstrap\Html;
use yii\helpers\Url;

$this->title = 'Partnership';
?>
<div class="site-index">

    <div class="grid-margin stretch-card">
        <div class="card bg-dark text-white">
            <img class="card-img" src="/images/bg-image.png" alt="Card image">
            <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                <h5 class="card-title"><?= Yii::t('start','Welcome')?>, <?= Yii::$app->user->identity->username ?>!</h5>
                <p class="card-text"><?= Yii::t('start','This is a start point for our further partnership. We hope, that this program will be comfortable for you.') ?></p>
                <p class="card-text">"Partnership" team.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card custom bg-dark text-white" style="width: 18rem;">
                <img class="card-img-top" src="/images/bg-1.png" alt="Card image cap" >
                <a href="<?= Url::toRoute(['/product']);?>">
                    <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                        <h5 class="card-title"><?= Yii::t('start','Products')?></h5>
                        <p class="card-text"><?= Yii::t('start','Here you are able to view all products and copy product\'s referral link.')?></p>
                    </div>
            </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card custom bg-dark text-white" style="width: 18rem;">
                <img class="card-img-top" src="/images/bg-2.png" alt="Card image cap">
                <a href="<?= Url::to(['profile/sources/'])?>">
                <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                    <h5 class="card-title"><?= Yii::t('start','Sources')?></h5>
                    <p class="card-text"><?= Yii::t('start','Here you are able to view all details of sources.')?></p>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card custom bg-dark text-white" style="width: 18rem;">
                <img class="card-img-top" src="/images/bg-3.png" alt="Card image cap" >
                <a href="<?= Url::toRoute(['/profile/edit','id'=>Yii::$app->user->id]);?>">
                <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                    <h5 class="card-title"><?= Yii::t('start','Your Profile - your cabinet')?></h5>
                    <p class="card-text"><?= Yii::t('start','In Your Profile Settings you can edit your info, sources and etc.')?></p>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card custom bg-dark text-white" style="width: 18rem;">
                <img class="card-img-top" src="/images/bg-4.png" alt="Card image cap">
                <a href="<?= Url::toRoute(['/wallet/update','id'=>Yii::$app->user->id]);?>">
                    <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                        <h5 class="card-title"><?= Yii::t('start','Wallet Settings')?></h5>
                        <p class="card-text"><?= Yii::t('start','In Your Wallet Settings you can change your main wallet and requisites.')?></p>
                    </div>
            </div>
            </a>
        </div>
    </div>
</div>
