<?php

use app\modules\company\Module;
use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\company\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('company','Companies');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
Modal::begin([
    'header'=>'<h4>'. Module::t('company','Adding a Company') .'</h4>',
    'id'=>'modal1',
    'size'=>'modal-md',
]);
echo "<div id='modalContent1' class='card'></div>";
Modal::end();
?>

<div class="company-index">
    <div class="card fade-out">
        <div class="card-body">
            <h1><?= Html::encode($this->title) ?>
                <button value="<?= Url::to(['/company/create']) ?>" class="btn btn-outline-primary" id="modalButton1" data-toggle="tooltip" data-placement="bottom"  title="<?= Module::t('company','Create a Company')?>">
                    <?= Module::t('company','Create') ?>
                </button>
            </h1>
            <?php if(!empty($companies)): ?>
                <table id="min-table" class="table table-hover table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <td><?= Module::t('company','ID')?></td>
                        <td><?= Module::t('company','Name')?></td>
                        <td><?= Module::t('company','Info')?></td>
                        <td><?= Module::t('company','Created At')?></td>
                        <td><?= Module::t('company','Updated At')?></td>
                        <td><?= Module::t('company','Actions')?></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($companies as $company):?>
                        <?php if($company->isRemoved() == 1): ?>
                            <tr>
                                <td><?= $company->id ?></td>
                                <td><?= $company->name ?></td>
                                <td><?= $company->info ?></td>
                                <td><?= $company->created_at ?></label></td>
                                <td><?= $company->updated_at ?></td>
                                <td>
                                    <button value="<?= Url::toRoute(['/company/view','id'=>$company->id]);?>" data-toggle="tooltip" title="<?= Module::t('company','View')?>" aria-label="View" class="btn btn-outline-dark btn-rounded btn-xs view-modal-click"><span class="fa fa-eye"></span></button>
                                    <a href="<?= Url::toRoute(['/company/update','id'=>$company->id]);?>" data-toggle="tooltip" title="<?= Module::t('company','Update')?>" aria-label="Update" class="btn btn-outline-dark btn-rounded btn-xs update-modal-click"><span class="fa fa-pencil" ></span></a>
                                    <a href="<?= Url::toRoute(['/company/remove','id'=>$company->id]);?>" data-toggle="tooltip" title="<?= Module::t('company','Delete')?>" aria-label="Delete" data-confirm="<?= Module::t('company','Are you sure you want to delete this item?')?>" class="btn btn-outline-dark btn-rounded btn-xs" data-method="post"><span class="fa fa-trash"></span></a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif;?>
        </div>
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
