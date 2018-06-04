<?php

use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Payouts';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="card fade-out">
    <div class="card-body">
        <h1><?= Html::encode($this->title) ?>
            <button value="<?= Url::to(['/payout/create']) ?>" class="btn btn-outline-primary" id="modalButton1" data-toggle="tooltip" data-placement="bottom"  title="Add Payout">
                Create
            </button>
        </h1>
        <?php if(!empty($payouts)): ?>
            <table id="min-table" class="table table-hover table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Wallet Type</td>
                    <td>Username</td>
                    <td>Payout (SUM)</td>
                    <td>Payout (CURRENCY)</td>
                    <td>Payout (SUM IN RUB)</td>
                    <td>Payout Status</td>
                    <td>Comment</td>
                    <td>Created At</td>
                    <!--                <td>Role</td>-->
                    <td>Actions</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach($payouts as $payout):?>
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
                            <button value="<?= Url::toRoute(['/payout/view','id'=>$payout->id]);?>" data-toggle="tooltip" title="View" aria-label="View" class="btn btn-outline-dark btn-rounded btn-xs view-modal-click"><span class="fa fa-eye"></span></button>
                            <a href="<?= Url::toRoute(['/payout/update','id'=>$payout->id]);?>" data-toggle="tooltip"  title="Update" aria-label="Update" class="btn btn-outline-dark btn-rounded btn-xs update-modal-click"><span class="fa fa-pencil" ></span></a>
                            <a href="<?= Url::toRoute(['/payout/delete','id'=>$payout->id]);?>" data-toggle="tooltip"  title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" class="btn btn-outline-dark btn-rounded btn-xs" data-method="post"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                    <!--                --><?php //endif; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
    <?php endif;?>
    </div>
</div>

<?php
Modal::begin([
    'header'=>'<h4>'. "Add Payout" .'</h4>',
    'id'=>'modal1',
    'size'=>'modal-md',
]);
echo "<div id='modalContent1' class='card'></div>";
Modal::end();
?>


<?php
Modal::begin([
    'header' => '<h4>'. "View Status" .'</h4>',
    'id' => 'view-modal',
    'size' => 'modal-md',
]);
echo "<div id='viewModalContent'></div>";
Modal::end();
?>
