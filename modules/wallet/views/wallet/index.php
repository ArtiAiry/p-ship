<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\wallet\models\WalletSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wallets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">

    <?php if(!empty($wallets)): ?>
        <div class="card-body">
            <h1>Wallets</h1>
            <div class="table-responsive">
                <table id="example" class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Payout Type</td>
                        <td>Yandex Money</td>
                        <td>Qiwi</td>
                        <td>Webmoney wmr</td>
                        <td>Privat</td>
<!--                        <td>Whatsapp</td>-->
                        <!--                <td>Role</td>-->
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($wallets as $wallet):?>
                        <!--                --><?php //if($profile->user->getRole() == 'teacher'): ?>
                        <tr>
                            <td><?= $wallet->id ?></td>
                            <td><?= $wallet->payoutType->name ?></td>
                            <td><?= $wallet->yandex_money ?></td>
                            <td><?= $wallet->qiwi ?></td>
                            <td><?= $wallet->webmoney_wmr ?></td>
                            <td><?= $wallet->pb_uah ?></td>
<!--                            <td>--><?//= $profile->whatsapp ?><!--</td>-->
                            <!--                        <td>--><?//= $profile->user->getRole() ?><!--</td>-->
                            <td>
                                <a href="<?= Url::toRoute(['/wallet/view','id'=>$wallet->id]);?>" title="View" aria-label="View"><span class="fa fa-eye"></span></a>
                                <a href="<?= Url::toRoute(['/wallet/update','id'=>$wallet->id]);?>" title="Update" aria-label="Update"><span class="fa fa-pencil"></span></a>
                                <a href="<?= Url::toRoute(['/wallet/delete','id'=>$wallet->id]);?>" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        <!--                --><?php //endif; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif;?>


</div>