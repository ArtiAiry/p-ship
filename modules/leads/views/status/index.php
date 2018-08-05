<?php

use app\modules\leads\Module;
use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('status','Statuses');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
digitv\bootstrap\widgets\Modal::begin([
    'header'=>'<h4>'. Module::t('status','Adding a Status') .'</h4>',
    'id'=>'modal1',
    'size'=>'modal-md',
]);
echo "<div id='modalContent1' class='card'></div>";
digitv\bootstrap\widgets\Modal::end();
?>


<div class="card fade-out">
    <div class="card-body">
        <h1><?= Html::encode($this->title) ?>
            <button value="<?= Url::to(['create']) ?>" class="btn btn-outline-primary" id="modalButton1" data-toggle="tooltip" data-placement="bottom"  title="<?= Module::t('status','Add Status') ?>">
                <?=  Module::t('status','Create') ?>
            </button>
        </h1>

        <?php if(!empty($statuses)): ?>
         <table id="min-table" class="table table-hover table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <td><?= Module::t('status','ID') ?></td>
                        <td><?= Module::t('status','Lead\'s Status Name') ?></td>
                        <td><?= Module::t('status','Actions') ?></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($statuses as $status):?>
                        <tr>
                            <td><?= $status->id ?></td>
                            <td><?= $status->name ?></td>
                            <td>
                                <!--                                <button value="--><?//= Url::toRoute(['/leads/status/view','id'=>$status->id]);?><!--" data-toggle="tooltip" id="modalButton2" title="View" aria-label="View" class="btn btn-outline-dark btn-rounded btn-xs"><span class="fa fa-eye"></span></button>-->
                                <button value="<?= Url::toRoute(['/leads/status/view','id'=>$status->id]);?>" data-toggle="tooltip" title="<?= Module::t('status','View') ?>" aria-label="View" class="btn btn-outline-dark btn-rounded btn-xs view-modal-click"><span class="fa fa-eye"></span></button>
                                <a href="<?= Url::toRoute(['/leads/status/update','id'=>$status->id]);?>" data-toggle="tooltip"  title="<?= Module::t('status','Update') ?>" aria-label="Update" class="btn btn-outline-dark btn-rounded btn-xs update-modal-click"><span class="fa fa-pencil" ></span></a>
                                <a href="<?= Url::toRoute(['/leads/status/delete','id'=>$status->id]);?>" data-toggle="tooltip"  title="<?= Module::t('status','Delete') ?>" aria-label="Delete" data-confirm="<?= Module::t('status','Are you sure you want to delete this item?') ?>" class="btn btn-outline-dark btn-rounded btn-xs" data-method="post"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
        <?php endif;?>
    </div>
</div>

<?php
Modal::begin([
    'header' => '<h4>'. Module::t('status','Viewing a Status') . '</h4>',
    'id' => 'view-modal',
    'size' => 'modal-md',
]);
echo "<div id='viewModalContent'></div>";
Modal::end();
?>

<!---->
<?php
//Modal::begin([
//    'header' => '<h4>'. "Update Status" .'</h4>',
//    'id' => 'update-modal',
//    'size' => 'modal-md',
//]);
//echo "<div id='viewModalContent'></div>";
//Modal::end();
//?>
