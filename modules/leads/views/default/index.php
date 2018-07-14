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

<div class="card fade-out">
    <div class="card-body">
        <h1><?= Html::encode($this->title)?>
            <?php if($profile->user->getRole() == 'admin'): ?>
            <button value="<?= Url::to(['/leads/create']) ?>" class="btn btn-outline-primary" id="modalButton1" data-toggle="tooltip" data-placement="bottom"  title="<?= Module::t('leads','Create a Lead')?>">
                <?= Module::t('leads','Create')?>
            </button>
            <?php endif; ?>
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
                    <td><?= Module::t('leads','ID')?></td>
                    <td><?= Module::t('leads','IP')?></td>
                    <td><?= Module::t('leads','User Device')?></td>
                    <td><?= Module::t('leads','User OS')?></td>
                    <td><?= Module::t('leads','Affiliate')?></td>
                    <td><?= Module::t('leads','Source')?></td>
                    <td><?= Module::t('leads','Product')?></td>
                    <td><?= Module::t('leads','Status')?></td>
                    <td><?= Module::t('leads','Price')?></td>
                    <td><?= Module::t('leads','Created At')?></td>
                    <td><?= Module::t('leads','Created At')?></td>
                    <?php if($profile->user->getRole() == 'admin'): ?>
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
                        <!--                        <td>--><?//= $profile->user->getRole() ?><!--</td>-->
                        <?php if($profile->user->getRole() == 'admin'): ?>
                        <td>
                            <button id="view-button" value="<?= Url::toRoute(['/leads/view','id'=>$lead->id]);?>" data-toggle="tooltip" title="<?= Module::t('leads','View')?>" aria-label="View" class="btn btn-outline-dark btn-rounded btn-xs view-modal-click"><span class="fa fa-eye"></span></button>
                            <a href="<?= Url::toRoute(['/leads/update','id'=>$lead->id]);?>" data-toggle="tooltip"  title="<?= Module::t('leads','Update')?>" aria-label="Update" class="btn btn-outline-dark btn-rounded btn-xs update-modal-click"><span class="fa fa-pencil" ></span></a>
                            <a href="<?= Url::toRoute(['/leads/remove','id'=>$lead->id]);?>" data-toggle="tooltip"  title="<?= Module::t('leads','Delete')?>" aria-label="Delete" data-confirm="<?= Module::t('leads','Are you sure you want to delete this item?')?>" class="btn btn-outline-dark btn-rounded btn-xs" data-method="post"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
    <?php endif;?>
    </div>
</div>


<?php
Modal::begin([
    'header' => '<h4>'. Module::t('leads','Lead\'s View') .'</h4>',
    'id' => 'view-modal',
    'size' => 'modal-md',
]);
echo "<div id='viewModalContent'></div>";
Modal::end();
?>
