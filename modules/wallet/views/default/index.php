<?php

use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wallets';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
digitv\bootstrap\widgets\Modal::begin([
    'header'=>'<h4>'. "Add Wallet" .'</h4>',
    'id'=>'modal1',
    'size'=>'modal-md',
]);
echo "<div id='modalContent1' class='card'></div>";
digitv\bootstrap\widgets\Modal::end();
?>

<div class="card fade-out">
    <div class="card-body">
        <h1>Wallets

            <button value="<?= Url::to(['/wallet/create']) ?>" class="btn btn-outline-primary" id="modalButton1" data-toggle="tooltip" data-placement="bottom"  title="Add Wallet">
                Create
            </button>
        </h1>
    <?php if(!empty($wallets)): ?>
            <div class="table-responsive">
                <table id="example" class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <td>ID</td>
<!--                        <td>Main Wallet 1</td>-->
                        <td>Main Wallet</td>
                        <td>Username</td>
                        <td>Yandex Money</td>
                        <td>Qiwi</td>
                        <td>Webmoney WMR</td>
                        <td>Sberbank RUB</td>
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
                            <td><?= $wallet->getMainWallet(); ?></td>
<!--                            <td>--><?//= $wallet->walletType->name ?><!--</td>-->
                            <td><?= $wallet->user->username ?></td>
                            <td><?= $wallet->yandex_money ?></td>
                            <td><?= $wallet->qiwi ?></td>
                            <td><?= $wallet->webmoney_wmr ?></td>
                            <td><?= $wallet->sberbank_rub ?></td>
                            <td><?= $wallet->pb_uah ?></td>
<!--                            <td>--><?//= $profile->whatsapp ?><!--</td>-->
                            <!--                        <td>--><?//= $profile->user->getRole() ?><!--</td>-->
                            <td>
                                <button value="<?= Url::toRoute(['/wallet/view','id'=>$wallet->id]);?>" data-toggle="tooltip" title="View" aria-label="View" class="btn btn-outline-dark btn-rounded btn-xs view-modal-click"><span class="fa fa-eye"></span></button>
                                <a href="<?= Url::toRoute(['/wallet/update','id'=>$wallet->id]);?>" data-toggle="tooltip"  title="Update" aria-label="Update" class="btn btn-outline-dark btn-rounded btn-xs update-modal-click"><span class="fa fa-pencil" ></span></a>
                                <a href="<?= Url::toRoute(['/wallet/delete','id'=>$wallet->id]);?>" data-toggle="tooltip"  title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" class="btn btn-outline-dark btn-rounded btn-xs" data-method="post"><span class="fa fa-trash"></span></a>
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

<?php
Modal::begin([
    'header' => '<h4>'. "View Wallet" .'</h4>',
    'id' => 'view-modal',
    'size' => 'modal-md',
]);
echo "<div id='viewModalContent'></div>";
Modal::end();
?>