<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $profile app\modules\profile\models\Profile */

$this->title = 'Update Profile:' . ' ' . $profile->user->username;;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $profile->id, 'url' => ['view', 'id' => $profile->id]];
$this->params['breadcrumbs'][] = 'Update';

$payout = new \app\modules\payout\models\Payout();
$wallet = \app\modules\wallet\models\Wallet::findOne(Yii::$app->user->id);
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
                        <p class="card-text text-right">Total Revenue</p>
                        <div class="fluid-container">
                            <h3 class="card-title font-weight-bold text-right mb-0"><?= $payout->getPayoutSummary(); ?> RUB</h3>
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
                <h5 class="card-title mb-4">Sources</h5>
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Salary</th>
                        <th>Country</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Bob Williams</td>
                        <td>$23,566</td>
                        <td>USA</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Mike Tyson</td>
                        <td>$10,200</td>
                        <td>Canada</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Tim Sebastian</td>
                        <td>$32,190</td>
                        <td>Netherlands</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Philip Morris</td>
                        <td>$31,123</td>
                        <td>Korea, South</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Minerva Hooper</td>
                        <td>$23,789</td>
                        <td>South Africa</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Cooper</td>
                        <td>$27,789</td>
                        <td>Canada</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Philip</td>
                        <td>$13,789</td>
                        <td>South Africa</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>