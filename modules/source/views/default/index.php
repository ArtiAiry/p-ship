<?php

use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sources';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
Modal::begin([
    'header'=>'<h4>'. "Add Source" .'</h4>',
    'id'=>'modal1',
    'size'=>'modal-md',
]);
echo "<div id='modalContent1' class='card'></div>";
Modal::end();
?>

<div class="card fade-out">
    <div class="card-body">
        <h1><?= Html::encode($this->title)?>

            <button value="<?= Url::to(['/source/create']) ?>" class="btn btn-outline-primary" id="modalButton1" data-toggle="tooltip" data-placement="bottom"  title="Add Source">
                Create
            </button>
        </h1>
        <?php if(!empty($sources)): ?>
        <div class="table-responsive">
            <table id="min-table" class="table table-hover table-bordered">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Source Name</td>
                    <td>Affliante</td>
                    <td>Source Type</td>
                    <td>Product</td>
                    <td>Monetization Type</td>
                    <td>Status</td>
                    <td>Source URL</td>
                    <td>Created At</td>
                    <td>Actions</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach($sources as $source):?>
                    <!--                --><?php //if($profile->user->getRole() == 'teacher'): ?>
                    <tr>
                        <td><?= $source->id ?></td>
                        <td><?= $source->name ?></td>
                        <td><?= $source->user->username ?></td>
                        <td><?= $source->sourceType->name  ?></td>
                        <td><?= $source->product->name ?></td>
                        <td><?= $source->monetizationType->name ?></td>
                        <td><?= $source->sourceStatus->name ?></td>
                        <td><a href="<?= $source->getBuildUrl(); ?>"><badge class="badge badge-primary"><?= $source->getBuildUrl(); ?></badge></a> <a class="btn btn-outline-primary btn-xs" data-clipboard-text="<?= $source->getBuildUrl(); ?>">Copy URL</a></td>
<!--                        <td><a href="#">www.partnership.io/?aff=--><?////= $source->user->id ?><!--<!--&s=--><?////= $source->id ?><!--<!--</a></td>-->

                        <td><?= $source->created_at ?></td>
                        <!--                            <td>--><?//= $profile->whatsapp ?><!--</td>-->
                        <!--                        <td>--><?//= $profile->user->getRole() ?><!--</td>-->
                        <td>
                            <button value="<?= Url::toRoute(['/source/view','id'=>$source->id]);?>" data-toggle="tooltip" title="View" aria-label="View" class="btn btn-outline-dark btn-rounded btn-xs view-modal-click"><span class="fa fa-eye"></span></button>
                            <a href="<?= Url::toRoute(['/source/update','id'=>$source->id]);?>" data-toggle="tooltip"  title="Update" aria-label="Update" class="btn btn-outline-dark btn-rounded btn-xs update-modal-click"><span class="fa fa-pencil" ></span></a>
                            <a href="<?= Url::toRoute(['/source/delete','id'=>$source->id]);?>" data-toggle="tooltip"  title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" class="btn btn-outline-dark btn-rounded btn-xs" data-method="post"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                    <!--                --><?php //endif; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif;?>


</div>

<?php
Modal::begin([
    'header' => '<h4>'. "View Source" .'</h4>',
    'id' => 'view-modal',
    'size' => 'modal-md',
]);
echo "<div id='viewModalContent'></div>";
Modal::end();
?>

<!--<div class="alert alert-primary" role="alert">-->
<!--    This is a primary alert—check it out!-->
<!--</div>-->
