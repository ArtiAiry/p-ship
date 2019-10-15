<?php

use app\modules\payout\Module;
use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = Module::t('payout','Payouts');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="card fade-out">
    <div class="card-body">
        <h1><?= Html::encode($this->title) ?>
            <button value="<?= Url::to(['/payout/create']) ?>" class="btn btn-outline-primary" id="modalButton1" data-toggle="tooltip" data-placement="bottom"  title="<?= Module::t('payout','Add Payout')?>">
               <?= Module::t('payout','Create') ?>
            </button>
        </h1>
        <?php if(!empty($payouts)): ?>
            <table id="min-table" class="table table-hover table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                <tr>
                    <td><?= Module::t('payout','ID')?></td>
                    <td><?= Module::t('payout','Wallet Type')?></td>
                    <td><?= Module::t('payout','Username')?></td>
                    <td><?= Module::t('payout','Payout Summary')?></td>
                    <td><?= Module::t('payout','Payout Currency')?></td>
                    <td><?= Module::t('payout','Payout Summary (RUB)')?></td>
                    <td><?= Module::t('payout','Payout Status')?></td>
                    <td><?= Module::t('payout','Comment')?></td>
                    <td><?= Module::t('payout','Created At')?></td>
                    <!--                <td>Role</td>-->
                    <td><?= Module::t('payout','Actions')?></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach($payouts as $payout):?>
                    <?php if($payout->isRemoved() == 1): ?>
                    <!--                --><?php //if($profile->user->getRole() == 'teacher'): ?>
                    <tr>
                        <td><?= $payout->id ?></td>
                        <td><?= $payout->walletType->name ?></td>
                        <td><?= $payout->user->username ?></td>
                        <td><?= $payout->payout_sum ?></label></td>
                        <td><?= $payout->getCurrencyName(); ?></td>
                        <td><?= $payout->payout_sum_rub ?></td>
                        <td><?= $payout->payoutStatus->name ?></td>
                        <td><?= $payout->comment ?></td>
                        <td><?= $payout->created_at ?></td>
                        <!--                        <td>--><?//= $profile->user->getRole() ?><!--</td>-->
                        <td>
                            <button value="<?= Url::toRoute(['/payout/view','id'=>$payout->id]);?>" data-toggle="tooltip" title="<?= Module::t('payout','View')?>" aria-label="View" class="btn btn-outline-dark btn-rounded btn-xs view-modal-click"><span class="fa fa-eye"></span></button>
                            <a href="<?= Url::toRoute(['/payout/update','id'=>$payout->id]);?>" data-toggle="tooltip" title="<?= Module::t('payout','Update')?>" aria-label="Update" class="btn btn-outline-dark btn-rounded btn-xs update-modal-click"><span class="fa fa-pencil" ></span></a>
                            <a href="<?= Url::toRoute(['/payout/remove','id'=>$payout->id]);?>" data-toggle="tooltip" title="<?= Module::t('payout','Delete')?>" aria-label="Delete" data-confirm="<?= Module::t('payout','Are you sure you want to delete this item?')?>" class="btn btn-outline-dark btn-rounded btn-xs" data-method="post"><span class="fa fa-trash"></span></a>
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
    'header'=>'<h4>'. Module::t('payout','Adding a Payout') .'</h4>',
    'id'=>'modal1',
    'size'=>'modal-md',
]);
echo "<div id='modalContent1' class='card'></div>";
Modal::end();
?>


<?php
Modal::begin([
    'header' => '<h4>'. Module::t('payout','View Payout') .'</h4>',
    'id' => 'view-modal',
    'size' => 'modal-md',
]);
echo "<div id='viewModalContent'></div>";
Modal::end();
?>
