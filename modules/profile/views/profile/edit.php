<?php

use app\modules\profile\Module;
use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $profile app\modules\profile\models\Profile */
/* @var $payout app\modules\payout\models\Payout */
/* @var $wallet app\modules\wallet\models\Wallet */
/* @var $user app\models\User */


$this->title = Module::t('profile','Edit Profile:') . ' ' . $profile->user->username;
$this->params['breadcrumbs'][] = ['label' => Module::t('profile','Profiles'), 'url' => ['/profile']];
$this->params['breadcrumbs'][] = ['label' => $profile->id, 'url' => ['view', 'id' => $profile->id]];
$this->params['breadcrumbs'][] = Module::t('profile','Edit');






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
                            <p class="card-text text-right"><?= Module::t('profile', 'Total Revenue') ?></p>
                            <div class="fluid-container">
                                <h4 class="card-title font-weight-bold text-right mb-0"><?= $payout->getSuccessPayoutSummary($profile->id); ?>
                                    /
                                    <?= $sumLead->getTotalLeadSummary($profile->id); ?> <i class="mdi mdi-currency-rub"></i> </h4>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3">
                        <i class="mdi mdi-information mr-1"
                           aria-hidden="true"></i> <?= Module::t('profile', 'Only payed transactions') ?>
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
                            <p class="card-text text-right"><?= Module::t('profile', 'Main Wallet') ?></p>
                            <div class="fluid-container">
                                <h4 class="card-title font-weight-bold text-right mb-0"><?= $wallet->getMainWallet(); ?></h4>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3">
                        <i class="mdi mdi-information mr-1"
                           aria-hidden="true"></i> <?= Module::t('profile', 'Priority Wallet') ?>
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
                            <p class="card-text text-right"><?= Module::t('profile', 'Wallet Settings') ?></p>
                            <div class="fluid-container">
                                <h4 class="card-title font-weight-bold text-right mb-0"><a
                                        href="<?= Url::to(['/settings/wallet']) ?>"
                                        class="btn btn-outline-primary btn-rounded btn-xs update-modal-click"><?= Module::t('profile', 'Update') ?></a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3">
                        <i class="mdi mdi-information mr-1"
                           aria-hidden="true"></i> <?= Module::t('profile', 'Here you can change wallet\'s settings') ?>
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
                            <p class="card-text text-right"><?= Module::t('profile', 'Access Control') ?></p>
                            <div class="fluid-container">
                                <h4 class="card-title font-weight-bold text-right mb-0">
                                    <a
                                        href="<?= Url::to(['/settings/email']) ?>"
                                        class="btn btn-outline-primary btn-rounded btn-xs update-modal-click"><?= Module::t('profile', 'Reset Email') ?></a>
                                    <a
                                        href="<?= Url::to(['/settings/password']) ?>"
                                        class="btn btn-outline-primary btn-rounded btn-xs update-modal-click"><?= Module::t('profile', 'Reset Password') ?></a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3">
                        <i class="mdi mdi-information mr-1"
                           aria-hidden="true"></i><?= Module::t('profile', 'Reset Password') ?>
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
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4"><?= Module::t('profile', 'Leads') ?> <a
                            href="<?= Url::to(['/leads']) ?>"
                            class="btn btn-outline-primary btn-xs"><?= Module::t('profile', 'View Full Table') ?></a>
                    </h3>
                    <table class="table table-hover table-bordered dt-responsive nowrap" style="width:100%"
                           id="portable">
                        <thead>
                        <tr>
                            <th><?= Module::t('profile', 'ID') ?></th>
                            <th><?= Module::t('profile', 'Source') ?></th>
                            <th><?= Module::t('profile', 'Product') ?></th>
                            <th><?= Module::t('profile', 'Actions') ?></th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($leads as $lead): ?>
                            <tr>
                                <td><?= $lead->id ?></td>
                                <td><?= $lead->source ?></td>
                                <td><?= $lead->product->name ?></td>
                                <td>
                                        <button value="<?= Url::toRoute(['/leads/view', 'id' => $lead->id]); ?>"
                                                data-toggle="tooltip" title="<?= Module::t('profile', 'View') ?>"
                                                aria-label="View"
                                                class="btn btn-outline-dark btn-rounded btn-xs view-modal-click"><span
                                                class="fa fa-eye"></span></button>
                                        <a href="<?= Url::toRoute(['/leads/update', 'id' => $lead->id]); ?>"
                                           data-toggle="tooltip" title="<?= Module::t('profile', 'Update') ?>"
                                           aria-label="Update"
                                           class="btn btn-outline-dark btn-rounded btn-xs update-modal-click"><span
                                                class="fa fa-pencil"></span></a>
                                        <a href="<?= Url::toRoute(['/leads/delete', 'id' => $lead->id]); ?>"
                                           data-toggle="tooltip" title="<?= Module::t('profile', 'Delete') ?>"
                                           aria-label="Delete" data-confirm="Are you sure you want to delete this item?"
                                           class="btn btn-outline-dark btn-rounded btn-xs" data-method="post"><span
                                                class="fa fa-trash"></span></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php
Modal::begin([
    'header' => '<h4>'. Module::t('profile','View Source') .'</h4>',
    'id' => 'view-modal',
    'size' => 'modal-md',
]);
echo "<div id='viewModalContent'></div>";
Modal::end();
?>