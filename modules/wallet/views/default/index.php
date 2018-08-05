<?php

use app\modules\wallet\Module;
use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('wallet','Wallets');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
digitv\bootstrap\widgets\Modal::begin([
    'header'=>'<h4>'. Module::t('wallet','Adding a Wallet') .'</h4>',
    'id'=>'modal1',
    'size'=>'modal-md',
]);
echo "<div id='modalContent1' class='card'></div>";
digitv\bootstrap\widgets\Modal::end();
?>

<div class="card fade-out">
    <div class="card-body">
        <h1><?= Module::t('wallet','Wallets') ?>

            <button value="<?= Url::to(['/wallet/create']) ?>" class="btn btn-outline-primary" id="modalButton1" data-toggle="tooltip" data-placement="bottom"  title="<?= Module::t('wallet','Add Wallet') ?>">
                <?=  Module::t('wallet','Create') ?>

            </button>
        </h1>
    <?php if(!empty($wallets)): ?>
        <table id="min-table" class="table table-hover table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <td><?= Module::t('wallet','ID') ?></td>
                        <td><?= Module::t('wallet','Main Wallet') ?></td>
                        <td><?= Module::t('wallet','Username') ?></td>
                        <td><?= Module::t('wallet','Yandex Money') ?></td>
                        <td><?= Module::t('wallet','Qiwi') ?></td>
                        <td><?= Module::t('wallet','Webmoney WMR') ?></td>
                        <td><?= Module::t('wallet','Sberbank RUB') ?></td>
                        <td><?= Module::t('wallet','Privat') ?></td>
                        <td><?= Module::t('wallet','Actions') ?></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($wallets as $wallet):?>
                        <?php if($wallet->isRemoved() == 1): ?>

                        <!--                --><?php //if($profile->user->getRole() == 'teacher'): ?>
                        <tr>
                            <td><?= $wallet->id ?></td>
                            <td><?= $wallet->getMainWallet(); ?></td>
                            <td><?= $wallet->user->username ?></td>
                            <td><?= $wallet->yandex_money ?></td>
                            <td><?= $wallet->qiwi ?></td>
                            <td><?= $wallet->webmoney_wmr ?></td>
                            <td><?= $wallet->sberbank_rub ?></td>
                            <td><?= $wallet->pb_uah ?></td>
                            <td>
                                <button value="<?= Url::toRoute(['/wallet/view','id'=>$wallet->id]);?>" data-toggle="tooltip" title="<?= Module::t('wallet','View') ?>" aria-label="View" class="btn btn-outline-dark btn-rounded btn-xs view-modal-click"><span class="fa fa-eye"></span></button>
                                <a href="<?= Url::toRoute(['/wallet/update','id'=>$wallet->id]);?>" data-toggle="tooltip"  title="<?= Module::t('wallet','Update') ?>" aria-label="Update" class="btn btn-outline-dark btn-rounded btn-xs update-modal-click"><span class="fa fa-pencil"></span></a>
                                <a href="<?= Url::toRoute(['/wallet/remove','id'=>$wallet->id]);?>" data-toggle="tooltip"  title="<?= Module::t('wallet','Delete') ?>" aria-label="Delete" data-confirm="<?= Module::t('wallet','Are you sure you want to delete this item?') ?>" class="btn btn-outline-dark btn-rounded btn-xs" data-method="post"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
    <?php endif;?>
    </div>
</div>

<?php
Modal::begin([
    'header' => '<h4>'. Module::t('wallet','Viewing a Wallet') .'</h4>',
    'id' => 'view-modal',
    'size' => 'modal-md',
]);
echo "<div id='viewModalContent'></div>";
Modal::end();
?>