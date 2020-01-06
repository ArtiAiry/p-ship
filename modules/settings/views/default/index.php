<?php

use app\modules\leads\models\ClicksLeads;
use app\modules\payout\models\Payout;
use app\modules\settings\Module;
use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $profile app\modules\profile\models\Profile */
/* @var $payout app\modules\payout\models\Payout */
/* @var $wallet app\modules\wallet\models\Wallet */
/* @var $user app\models\User */


$this->title = Module::t('settings', 'Edit Profile:') . ' ' . $profile->user->username;
$this->params['breadcrumbs'][] = Module::t('settings', 'Profile\'s Settings');


?>
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-coins text-primary icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="card-text text-right"><?= Module::t('settings', 'Total Revenue') ?></p>
                            <div class="fluid-container">
                                <h4 class="card-title font-weight-bold text-right mb-0"><?= Payout::getSuccessPayoutSummary(Yii::$app->user->id); ?>
                                    /
                                    <?= ClicksLeads::getTotalLeadSummary(Yii::$app->user->id); ?> <i
                                            class="mdi mdi-currency-rub"></i></h4>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3">
                        <i class="mdi mdi-information mr-1"
                           aria-hidden="true"></i> <?= Module::t('settings', 'Only payed transactions') ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-wallet-membership text-primary icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="card-text text-right"><?= Module::t('settings', 'Main Wallet') ?></p>
                            <div class="fluid-container">
                                <h4 class="card-title font-weight-bold text-right mb-0"><?= $wallet->getMainWallet(); ?></h4>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3">
                        <i class="mdi mdi-information mr-1"
                           aria-hidden="true"></i> <?= Module::t('settings', 'Priority Wallet') ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-wallet text-primary icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="card-text text-right"><?= Module::t('settings', 'Wallet Settings') ?></p>
                            <div class="fluid-container">
                                <h4 class="card-title font-weight-bold text-right mb-0"><a
                                            href="<?= Url::to(['/settings/wallet']) ?>"
                                            class="btn btn-outline-primary btn-rounded btn-xs update-modal-click"><?= Module::t('settings',
                                            'Edit') ?></a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3">
                        <i class="mdi mdi-information mr-1"
                           aria-hidden="true"></i> <?= Module::t('settings',
                            'Here you can change wallet\'s settings') ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-lock-question text-primary icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="card-text text-right"><?= Module::t('settings', 'Access Control') ?></p>
                            <div class="fluid-container">
                                <h4 class="card-title font-weight-bold text-right mb-0">
                                    <a
                                            href="<?= Url::to(['/settings/email']) ?>"
                                            class="btn btn-outline-primary btn-rounded btn-xs update-modal-click"><?= Module::t('settings',
                                            'Reset Email') ?></a>
                                    <a
                                            href="<?= Url::to(['/settings/password']) ?>"
                                            class="btn btn-outline-primary btn-rounded btn-xs update-modal-click"><?= Module::t('settings',
                                            'Reset Password') ?></a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3">
                        <i class="mdi mdi-information mr-1"
                           aria-hidden="true"></i><?= Module::t('settings', 'Reset Password') ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 grid-margin stretch-card">
            <div class="card lg-8">
                <div class="card-body">

                    <h3><?= Html::encode($this->title) ?> </h3>

                    <?= $this->render('@app/modules/profile/views/profile/_form', [
                        'profile' => $profile,
                    ]) ?>

                </div>
            </div>
        </div>
    </div>


<?php
Modal::begin([
    'header' => '<h4>' . Module::t('settings', 'View Source') . '</h4>',
    'id' => 'view-modal',
    'size' => 'modal-md',
]);
echo "<div id='viewModalContent'></div>";
Modal::end();
?>