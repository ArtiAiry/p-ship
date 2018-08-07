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
                                <h4 class="card-title font-weight-bold text-right mb-0"><?= $payout->getSuccessPayoutSummary(); ?>
                                    /
                                    <?= $sumLead->getTotalLeadSummary(); ?> <i class="mdi mdi-currency-rub"></i> </h4>
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
                                        class="btn btn-outline-primary btn-rounded btn-xs update-modal-click"><?= Module::t('settings', 'Update') ?></a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3">
                        <i class="mdi mdi-information mr-1"
                           aria-hidden="true"></i> <?= Module::t('settings', 'Here you can change wallet\'s settings') ?>
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
                                        href="<?= Url::to(['/settings/reset-email']) ?>"
                                        class="btn btn-outline-primary btn-rounded btn-xs update-modal-click"><?= Module::t('settings', 'Reset Email') ?></a>
                                    <a
                                        href="<?= Url::to(['/settings/password']) ?>"
                                        class="btn btn-outline-primary btn-rounded btn-xs update-modal-click"><?= Module::t('settings', 'Reset Password') ?></a>
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
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4"><?= Module::t('settings', 'Leads') ?> <a
                            href="<?= Url::to(['/leads']) ?>"
                            class="btn btn-outline-primary btn-xs"><?= Module::t('settings', 'View Full Table') ?></a>
                    </h3>
                    <table class="table table-hover table-bordered dt-responsive nowrap" style="width:100%"
                           id="portable">
                        <thead>
                        <tr>
                            <th><?= Module::t('settings', 'ID') ?></th>
                            <th><?= Module::t('settings', 'Source') ?></th>
                            <th><?= Module::t('settings', 'Product') ?></th>
                            <?php if ($profile->user->getRole() == 'admin'): ?>
                                <th><?= Module::t('settings', 'Actions') ?></th>
                            <?php endif; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($leads as $lead): ?>
                            <tr>
                                <td><?= $lead->id ?></td>
                                <td><?= $lead->source ?></td>
                                <td><?= $lead->product->name ?></td>
                                <?php if ($profile->user->getRole() == 'admin'): ?>
                                    <td>
                                        <button value="<?= Url::toRoute(['/leads/view', 'id' => $lead->id]); ?>"
                                                data-toggle="tooltip" title="<?= Module::t('settings', 'View') ?>"
                                                aria-label="View"
                                                class="btn btn-outline-dark btn-rounded btn-xs view-modal-click"><span
                                                class="fa fa-eye"></span></button>
                                        <a href="<?= Url::toRoute(['/leads/update', 'id' => $lead->id]); ?>"
                                           data-toggle="tooltip" title="<?= Module::t('settings', 'Update') ?>"
                                           aria-label="Update"
                                           class="btn btn-outline-dark btn-rounded btn-xs update-modal-click"><span
                                                class="fa fa-pencil"></span></a>
                                        <a href="<?= Url::toRoute(['/leads/delete', 'id' => $lead->id]); ?>"
                                           data-toggle="tooltip" title="<?= Module::t('settings', 'Delete') ?>"
                                           aria-label="Delete" data-confirm="Are you sure you want to delete this item?"
                                           class="btn btn-outline-dark btn-rounded btn-xs" data-method="post"><span
                                                class="fa fa-trash"></span></a>
                                    </td>
                                <?php endif; ?>
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
    'header' => '<h4>' . Module::t('settings', 'View Source') . '</h4>',
    'id' => 'view-modal',
    'size' => 'modal-md',
]);
echo "<div id='viewModalContent'></div>";
Modal::end();
?>