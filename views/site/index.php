<?php

/* @var $this yii\web\View */

use yii\bootstrap\Html;
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="grid-margin stretch-card">
        <div class="card bg-dark text-white">
            <img class="card-img" src="/images/bg-image.png" alt="Card image">
            <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                <h5 class="card-title">Welcome, <?= Yii::$app->user->identity->username ?>!</h5>
                <p class="card-text">This is your a start point for our further partnership. We hope, that this program will be comfortable for you.</p>
                <p class="card-text">Partnership team.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card custom bg-dark text-white" style="width: 18rem;">
                <img class="card-img-top" src="/images/bg-1.png" alt="Card image cap" >
                <a href="<?= Url::toRoute(['/product']);?>">
                    <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                        <h5 class="card-title">Products</h5>
                        <p class="card-text">Here you are able to view all products and steam them.</p>
                    </div>
            </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card custom bg-dark text-white" style="width: 18rem;">
                <img class="card-img-top" src="/images/bg-2.png" alt="Card image cap">
                <a href="<?= Url::to(['profile/sources/'])?>">
                <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                    <h5 class="card-title">Sources</h5>
                    <p class="card-text">Here you are able to view all details of sources and steam them.</p>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card custom bg-dark text-white" style="width: 18rem;">
                <img class="card-img-top" src="/images/bg-3.png" alt="Card image cap" >
                <a href="<?= Url::toRoute(['/profile/edit','id'=>Yii::$app->user->id]);?>">
                <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                    <h5 class="card-title">Your Profile - your cabinet</h5>
                    <p class="card-text">In Your Profile Settings you can edit your info, sources and etc.</p>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card custom bg-dark text-white" style="width: 18rem;">
                <img class="card-img-top" src="/images/bg-4.png" alt="Card image cap">
                <a href="<?= Url::toRoute(['/wallet/update','id'=>Yii::$app->user->id]);?>">
                    <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                        <h5 class="card-title">Wallet Settings</h5>
                        <p class="card-text">In Your Wallet Settings you can change your main wallet and requisities.</p>
                    </div>
            </div>
            </a>
        </div>
    </div>
</div>
