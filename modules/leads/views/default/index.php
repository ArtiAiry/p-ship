<?php

use app\modules\leads\Module;
use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = Module::t('leads','Leads');
$this->params['breadcrumbs'][] = $this->title;



?>

<?php
Modal::begin([
    'header'=>'<h4>'. Module::t('leads','Adding a Lead') .'</h4>',
    'id'=>'modal1',
    'size'=>'modal-md',
]);
echo "<div id='modalContent1' class='card'></div>";
Modal::end();


?>

<badge id="reportrange" class="btn btn-outline-primary">

    <span></span> <b class="caret"></b>
</badge>

<p></p>

<div class="card fade-out">
    <div class="card-body">
        <h1><?= Html::encode($this->title)?>
            <?php if($profile->user->getRole() == 'admin'): ?>
            <button value="<?= Url::to(['/leads/create']) ?>" class="btn btn-outline-primary" id="modalButton1" data-toggle="tooltip" data-placement="bottom"  title="<?= Module::t('leads','Create a Lead')?>">
                <?= Module::t('leads','Create')?>
            </button>
            <?php endif; ?>
        </h1>
        <table id="demo-table" class="table table-hover table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                <tr>
                    <td><?= Module::t('leads','ID')?></td>
                    <td><?= Module::t('leads','CRM ID')?></td>
                    <td><?= Module::t('leads','Created At')?></td>
                    <td><?= Module::t('leads','User Device')?></td>
                    <td><?= Module::t('leads','User OS')?></td>
                    <td><?= Module::t('leads','Source')?></td>
                    <td><?= Module::t('leads','Product')?></td>
                    <td><?= Module::t('leads','Status')?></td>
                    <td><?= Module::t('leads','Price')?></td>
                    <?php if($profile->user->getRole() == 'admin'): ?>
                    <td><?= Module::t('leads','Affiliate')?></td>
                    <td><?= Module::t('leads','Actions')?></td>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach($leads as $lead):?>
                    <?php if($lead->isRemoved() == 1): ?>
                    <!--                --><?php //if($profile->user->getRole() == 'teacher'): ?>
                    <tr>
                        <td><?= $lead->id ?></td>
                        <td><?= $lead->crm_id ?></td>
<!--                        <td>06.0--><?//= $lead->id ?><!--.18</td>-->
                        <td><?= Yii::$app->formatter->asDate($lead->created_at) . " " . Yii::$app->formatter->asTime($lead->created_at)?></td>
                        <td><?= $lead->user_device ?></td>
                        <td><?= $lead->user_os ?></td>

                        <td><?= $lead->source  ?></td>
                        <td><?= $lead->product->name ?></td>
                        <td><?= $lead->leadsStatus->name ?></td>
                        <td><?= $lead->price ?></td>
                        <!--                        <td>--><?//= $profile->user->getRole() ?><!--</td>-->
                        <?php if($profile->user->getRole() == 'admin'): ?>
                        <td><?= $lead->user->username ?></td>
                        <td>
                            <button value="<?= Url::toRoute(['/leads/view','id'=>$lead->id]);?>" data-toggle="tooltip" title="<?= Module::t('leads','View')?>" aria-label="View" class="btn btn-outline-dark btn-rounded btn-xs view-modal-click"><span class="fa fa-eye"></span></button>
                            <a href="<?= Url::toRoute(['/leads/update','id'=>$lead->id]);?>" data-toggle="tooltip"  title="<?= Module::t('leads','Update')?>" aria-label="Update" class="btn btn-outline-dark btn-rounded btn-xs update-modal-click"><span class="fa fa-pencil" ></span></a>
                            <a href="<?= Url::toRoute(['/leads/remove','id'=>$lead->id]);?>" data-toggle="tooltip"  title="<?= Module::t('leads','Delete')?>" aria-label="Delete" data-confirm="<?= Module::t('leads','Are you sure you want to delete this item?')?>" class="btn btn-outline-dark btn-rounded btn-xs" data-method="post"><span class="fa fa-trash"></span></a>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
    </div>
</div>



<!--<div id="reportrange" class="btn btn-success btn-lg">-->
<!---->
<!--    <span></span> <b class="caret"></b>-->
<!--</div>-->
<!--<hr>-->
<!--<br>-->
<!--<table id="example" class="table table-striped" cellspacing="0" width="100%"></table>-->
<!---->

<?php
Modal::begin([
    'header' => '<h4>'. Module::t('leads','Lead\'s View') .'</h4>',
    'id' => 'view-modal',
    'size' => 'modal-md',
]);
echo "<div id='viewModalContent'></div>";
Modal::end();
?>
