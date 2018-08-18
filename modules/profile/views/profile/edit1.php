<?php

use app\modules\settings\Module;
use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $profile app\modules\profile\models\Profile */
/* @var $payout app\modules\payout\models\Payout */
/* @var $wallet app\modules\wallet\models\Wallet */
/* @var $user app\models\User */


$this->title = Module::t('settings','Edit Profile:') . ' ' . $profile->user->username;
$this->params['breadcrumbs'][] = ['label' => Module::t('settings','Profiles'), 'url' => ['/profile']];
$this->params['breadcrumbs'][] = ['label' => $profile->id, 'url' => ['view', 'id' => $profile->id]];
$this->params['breadcrumbs'][] = Module::t('settings','Edit');




?>
<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-cube text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                        <p class="card-text text-right"><?= Module::t('settings','Total Revenue') ?></p>
                        <div class="fluid-container">
                            <h3 class="card-title font-weight-bold text-right mb-0"><?= $payout->getSuccessPayoutSummary(); ?> /
                                <?= $payout->getSuccessPayoutSummary(); ?> RUB </h3>
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-3">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> <?= Module::t('settings','Only payed transactions') ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-receipt text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                        <p class="card-text text-right"><?= Module::t('settings','Main Wallet') ?></p>
                        <div class="fluid-container">
                            <h3 class="card-title font-weight-bold text-right mb-0"><?= $wallet->getMainWallet(); ?></h3>
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-3">
                    <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> <?= Module::t('settings','Priority Wallet') ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-poll-box text-teal icon-lg"></i>
                    </div>
                    <div class="float-right">
                        <p class="card-text text-right"><?= Module::t('settings','Wallet Settings') ?></p>
                        <div class="fluid-container">
                            <h3 class="card-title font-weight-bold text-right mb-0"><a href="<?= Url::to(['/wallet/update','id'=>$wallet->id]) ?>" data-toggle="tooltip"  title="<?= Module::t('settings','Update') ?>" aria-label="Update" class="btn btn-outline-primary btn-rounded btn-xs update-modal-click"><?= Module::t('settings','Update') ?></a> </h3>
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-3">
                    <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> <?= Module::t('settings','Here you can change wallet\'s settings') ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-account-location text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                        <p class="card-text text-right"><?= Module::t('settings','Password Settings') ?></p>
                        <div class="fluid-container">
                            <h3 class="card-title font-weight-bold text-right mb-0"><a href="<?= Url::to(['/site/request-password-reset']) ?>" data-toggle="tooltip"  title="<?= Module::t('settings','Reset') ?>" aria-label="Reset" class="btn btn-outline-primary btn-rounded btn-xs update-modal-click"><?= Module::t('settings','Reset') ?></a></h3>
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-3">
                    <i class="mdi mdi-reload mr-1" aria-hidden="true"></i><?= Module::t('settings','Reset Password') ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card lg-8">
            <div class="card-body">

                <h1><?= Html::encode($this->title) ?> </h1>

                <?= $this->render('@app/modules/profile/views/profile/_form', [
                    'user' => $user,
                    'profile' => $profile,
                ]) ?>

            </div>
        </div>
    </div>
</div>

<?php
Modal::begin([
    'header' => '<h4>'. Module::t('settings','View Source') .'</h4>',
    'id' => 'view-modal',
    'size' => 'modal-md',
]);
echo "<div id='viewModalContent'></div>";
Modal::end();
?>