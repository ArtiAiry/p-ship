<?php

use app\modules\product\Module;
use app\modules\profile\models\Profile;
use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('product','Products');
$this->params['breadcrumbs'][] = $this->title;


?>
<?php
digitv\bootstrap\widgets\Modal::begin([
    'header'=>'<h4>'. Module::t('product','Adding a Product') .'</h4>',
    'id'=>'modal1',
    'size'=>'modal-md',
]);
echo "<div id='modalContent1' class='card'></div>";
digitv\bootstrap\widgets\Modal::end();
?>

<h1 class="h-center mb-4"><?= Html::encode($this->title)?>
    <?php if($profile->user->getRole() == 'admin'): ?>
    <button value="<?= Url::to(['/product/create']) ?>" class="btn btn-outline-primary" id="modalButton1" data-toggle="tooltip" data-placement="bottom"  title="<?=  Module::t('product','Add Product') ?>">
        <?= Module::t('product','Create')?>
    </button>
    <?php endif; ?>
</h1>

<div class="card fade-out">
        <div class="card-body">
        <h1><?= Html::encode($this->title)?></h1>
        <?php if(!empty($products)): ?>
            <table id="min-table" class="table table-hover table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                <tr>
                    <td><?= Module::t('product','ID')?></td>
                    <td><?= Module::t('product','Product Name')?></td>
                    <td><?= Module::t('product','Company')?></td>
                    <td><?= Module::t('product','Description')?></td>
                    <td><?= Module::t('product','Price')?></td>
                    <td><?= Module::t('product','Partner\'s Link')?></td>
                    <td><?= Module::t('product','Banner\'s Url')?></td>
                    <td><?= Module::t('product','Actions')?></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach($products as $product):?>
                    <tr>
                        <td><?= $product->id ?></td>
                        <td><?= $product->name ?></td>
                        <td><?= $product->company->name ?></td>
                        <td><?= $product->description ?></td>
                        <td><?= $product->price ?></td>
                        <td><label class="badge badge-primary"><?= $product->getBuildUrl(); ?></label> <a class="btn btn-outline-primary btn-xs mt-1 mb-1" data-clipboard-text="<?= $product->getBuildUrl(); ?>">Копировать</a></td>
                        <td><a href="<?= $product->banner_url ?>" class="btn btn-primary download-banner" download="banners.rar"><?= Module::t('product','Banner\'s link')?></a> </td>
                        <td>
                            <button value="<?= Url::toRoute(['/product/view','id'=>$product->id]);?>" data-toggle="tooltip" title="<?= Module::t('product','View')?>" aria-label="View" class="btn btn-outline-dark btn-rounded btn-xs view-modal-click"><span class="fa fa-eye"></span></button>
                            <a href="<?= Url::toRoute(['/product/edit','id'=>$product->id]);?>" data-toggle="tooltip"  title="<?= Module::t('product','Update')?>" aria-label="Update" class="btn btn-outline-dark btn-rounded btn-xs update-modal-click"><span class="fa fa-pencil" ></span></a>
                            <a href="<?= Url::toRoute(['/product/remove','id'=>$product->id]);?>" data-toggle="tooltip"  title="<?= Module::t('product','Delete')?>" aria-label="Delete" data-confirm="<?= Module::t('product','Are you sure you want to delete this item?') ?>" class="btn btn-outline-dark btn-rounded btn-xs" data-method="post"><span class="fa fa-trash"></span></a>
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
    'header' => '<h4>'. Module::t('product','Viewing a Product') .'</h4>',
    'id' => 'view-modal',
    'size' => 'modal-md',
]);
echo "<div id='viewModalContent'></div>";
Modal::end();
?>