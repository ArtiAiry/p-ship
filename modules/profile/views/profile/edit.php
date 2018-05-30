<?php

use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $profile app\modules\profile\models\Profile */
/* @var $payout app\modules\payout\models\Payout */
/* @var $wallet app\modules\wallet\models\Wallet */
/* @var $sources app\modules\source\models\Source */
/* @var $user app\models\User */


$this->title = 'Edit Profile:' . ' ' . $profile->user->username;;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $profile->id, 'url' => ['view', 'id' => $profile->id]];
$this->params['breadcrumbs'][] = 'Edit';




?>
<!--    <div class="grid-margin stretch-card">-->
<!---->
<!--            <div class="card bg-dark text-white">-->
<!--                <img class="card-img" src="/images/bg-image.png" alt="Card image">-->
<!--                    <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">-->
<!--                        <h5 class="card-title">Card title</h5>-->
<!--                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>-->
<!--                        <p class="card-text">Last updated 3 mins ago</p>-->
<!--                    </div>-->
<!--            </div>-->
<!--    </div>-->
<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-cube text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                        <p class="card-text text-right">Total Revenue</p>
                        <div class="fluid-container">
                            <h3 class="card-title font-weight-bold text-right mb-0"><?= $payout->getSuccessPayoutSummary(); ?> /
                                <?= $lead->getLeadSummary(); ?> RUB </h3>
<!--                            <h3 class="card-title font-weight-bold text-right mb-0">$65,650</h3>-->
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-3">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Only payed transactions
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
                        <p class="card-text text-right">Main Wallet</p>
                        <div class="fluid-container">
                            <h3 class="card-title font-weight-bold text-right mb-0"><?= $wallet->getMainWallet(); ?></h3>
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-3">
                    <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Product-wise sales
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
                        <p class="card-text text-right">Wallet Settings</p>
                        <div class="fluid-container">
                            <h3 class="card-title font-weight-bold text-right mb-0"><a href="<?= Url::to(['/wallet/update','id'=>$wallet->id]) ?>" data-toggle="tooltip"  title="Update" aria-label="Update" class="btn btn-outline-primary btn-rounded btn-xs update-modal-click">Update</a> </h3>
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-3">
                    <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Here you can change wallet's settings
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
                        <p class="card-text text-right">Password Settings</p>
                        <div class="fluid-container">
                            <h3 class="card-title font-weight-bold text-right mb-0"><a href="<?= Url::to(['/site/request-password-reset']) ?>" data-toggle="tooltip"  title="Reset" aria-label="Reset" class="btn btn-outline-primary btn-rounded btn-xs update-modal-click">Reset</a> </h3>
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-3">
                    <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Reset Password
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card lg-8">
            <div class="card-body">

                <h1><?= Html::encode($this->title) ?></h1>

                <?= $this->render('_form', [
                    'user' => $user,
                    'profile' => $profile,
                ]) ?>

            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Sources  <a href="<?= Url::to(['profile/sources/'])?>" class="btn btn-outline-primary btn-xs">View Full Table</a></h5>
                <table class="table table-hover table-striped" id="min-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Source Name</th>
                        <th>Source Type</th>
                        <th>Country</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($sources as $source):?>
                    <tr>
                        <td><?= $source->id ?></td>
                        <td><?= $source->name ?></td>
                        <td><?= $source->sourceType->name ?></td>
                        <td>
                            <button value="<?= Url::toRoute(['/source/view','id'=>$source->id]);?>" data-toggle="tooltip" title="View" aria-label="View" class="btn btn-outline-dark btn-rounded btn-xs view-modal-click"><span class="fa fa-eye"></span></button>
                            <a href="<?= Url::toRoute(['/source/update','id'=>$source->id]);?>" data-toggle="tooltip"  title="Update" aria-label="Update" class="btn btn-outline-dark btn-rounded btn-xs update-modal-click"><span class="fa fa-pencil" ></span></a>
                            <a href="<?= Url::toRoute(['/source/delete','id'=>$source->id]);?>" data-toggle="tooltip"  title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" class="btn btn-outline-dark btn-rounded btn-xs" data-method="post"><span class="fa fa-trash"></span></a>
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
    'header' => '<h4>'. "View Source" .'</h4>',
    'id' => 'view-modal',
    'size' => 'modal-md',
]);
echo "<div id='viewModalContent'></div>";
Modal::end();
?>