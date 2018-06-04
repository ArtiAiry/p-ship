<?php

use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Leads';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
Modal::begin([
    'header'=>'<h4>'. "Add Lead" .'</h4>',
    'id'=>'modal1',
    'size'=>'modal-md',
]);
echo "<div id='modalContent1' class='card'></div>";
Modal::end();
?>

<div class="card fade-out">
    <div class="card-body">
        <h1><?= Html::encode($this->title)?>

            <button value="<?= Url::to(['/leads/create']) ?>" class="btn btn-outline-primary" id="modalButton1" data-toggle="tooltip" data-placement="bottom"  title="Add Lead">
                Create
            </button>
        </h1>
        <?php if(!empty($leads)): ?>
<!--            <table border="0" cellspacing="5" cellpadding="5">-->
<!--                <tbody>-->
<!--                <tr>-->
<!--                    <td>From:</td>-->
<!--                    <td><input name="min" id="min" type="text"></td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>To:</td>-->
<!--                    <td><input name="max" id="max" type="text"></td>-->
<!--                </tr>-->
<!--                </tbody>-->
<!--            </table>-->
        <table id="extended-table" class="table table-hover table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>IP</td>
                    <td>User Device</td>
                    <td>User OS</td>
                    <td>Username</td>
                    <td>Source</td>
                    <td>Product</td>
                    <td>Status</td>
                    <td>Price</td>
                    <td>Created At</td>
                    <td>Created At</td>
                    <td>Actions</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach($leads as $lead):?>
                    <!--                --><?php //if($profile->user->getRole() == 'teacher'): ?>
                    <tr>
                        <td><?= $lead->id ?></td>
                        <td><?= $lead->ip ?></td>
                        <td><?= $lead->user_device ?></td>
                        <td><?= $lead->user_os ?></td>
                        <td><?= $lead->user->username ?></td>
                        <td><?= $lead->source  ?></td>
                        <td><?= $lead->product->name ?></td>
                        <td><?= $lead->leadsStatus->name ?></td>
                        <td><?= $lead->price ?></td>
                        <td><?= Yii::$app->formatter->asDate($lead->created_at) . " " . Yii::$app->formatter->asTime($lead->created_at)?></td>
                        <td>06.<?= $lead->id ?>.18</td>

                        <!--                            <td>--><?//= $profile->whatsapp ?><!--</td>-->
                        <!--                        <td>--><?//= $profile->user->getRole() ?><!--</td>-->
                        <td>
                            <button value="<?= Url::toRoute(['/leads/view','id'=>$lead->id]);?>" data-toggle="tooltip" title="View" aria-label="View" class="btn btn-outline-dark btn-rounded btn-xs view-modal-click"><span class="fa fa-eye"></span></button>
                            <a href="<?= Url::toRoute(['/leads/update','id'=>$lead->id]);?>" data-toggle="tooltip"  title="Update" aria-label="Update" class="btn btn-outline-dark btn-rounded btn-xs update-modal-click"><span class="fa fa-pencil" ></span></a>
                            <a href="<?= Url::toRoute(['/leads/delete','id'=>$lead->id]);?>" data-toggle="tooltip"  title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" class="btn btn-outline-dark btn-rounded btn-xs" data-method="post"><span class="fa fa-trash"></span></a>
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
    'header' => '<h4>'. "View Lead" .'</h4>',
    'id' => 'view-modal',
    'size' => 'modal-md',
]);
echo "<div id='viewModalContent'></div>";
Modal::end();
?>
