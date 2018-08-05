<?php

use app\modules\wallet\Module;
use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('type','Wallet Types');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
Modal::begin([
    'header'=>'<h4>'.  Module::t('type','Adding a Wallet Type') .'</h4>',
    'id'=>'modal1',
    'size'=>'modal-md',
]);
echo "<div id='modalContent1' class='card'></div>";
Modal::end();
?>

<div class="card fade-out">
    <div class="card-body">
        <h1><?= Html::encode($this->title) ?>
            <button value="<?= Url::to(['create']) ?>" class="btn btn-outline-primary" id="modalButton1" data-toggle="tooltip" data-placement="bottom"  title="<?= Module::t('type','Add Wallet\'s Type') ?>">
                <?= Module::t('wallet','Create') ?>
            </button>
        </h1>
    <?php if(!empty($types)): ?>
        <table id="min-table" class="table table-hover table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <td><?= Module::t('type','ID') ?></td>
                        <td><?= Module::t('type','Wallet Type\'s Name') ?></td>
                        <td><?= Module::t('type','Actions') ?></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($types as $type):?>
                        <tr>
                            <td><?= $type->id ?></td>
                            <td><?= $type->name ?></td>
                            <td>
                                <button value="<?= Url::toRoute(['/wallet/type/view','id'=>$type->id]);?>" data-toggle="tooltip" aria-label="View" title="<?= Module::t('type','View') ?>" class="btn btn-outline-dark btn-rounded btn-xs view-modal-click"><span class="fa fa-eye"></span></button>
                                <a href="<?= Url::toRoute(['/wallet/type/update','id'=>$type->id]);?>" data-toggle="tooltip"   aria-label="Update" title="<?= Module::t('type','Update') ?>" class="btn btn-outline-dark btn-rounded btn-xs update-modal-click"><span class="fa fa-pencil" ></span></a>
                                <a href="<?= Url::toRoute(['/wallet/type/delete','id'=>$type->id]);?>" data-toggle="tooltip"   aria-label="Delete" title="<?= Module::t('type','Delete') ?>" data-confirm="<?= Module::t('type','Are you sure you want to delete this item?') ?>" class="btn btn-outline-dark btn-rounded btn-xs" data-method="post"><span class="fa fa-trash"></span></a>
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
    'header' => '<h4>'. Module::t('type','View Wallet\'s Type') .'</h4>',
    'id' => 'view-modal',
    'size' => 'modal-md',
]);
echo "<div id='viewModalContent'></div>";
Modal::end();
?>