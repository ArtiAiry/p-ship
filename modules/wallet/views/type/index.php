<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wallet Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
digitv\bootstrap\widgets\Modal::begin([
    'header'=>'<h4>'. "Add Wallet Type" .'</h4>',
    'id'=>'modal1',
    'size'=>'modal-md',
]);
echo "<div id='modalContent1' class='card'></div>";
digitv\bootstrap\widgets\Modal::end();
?>

<div class="card fade-out">
    <div class="card-body">
        <h1><?= Html::encode($this->title) ?>
            <button value="<?= Url::to(['create']) ?>" class="btn btn-outline-primary" id="modalButton1" data-toggle="tooltip" data-placement="bottom"  title="Add Wallet Type">
                Create
            </button>
        </h1>

    <?php if(!empty($types)): ?>

            <div class="table-responsive">

                <table id="example" class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($types as $type):?>
                        <tr>
                            <td><?= $type->id ?></td>
                            <td><?= $type->name ?></td>
                            <td>
                                <a href="<?= Url::toRoute(['/source/monetization/view','id'=>$type->id]);?>" title="View" aria-label="View"><span class="fa fa-eye"></span></a>
                                <a href="<?= Url::toRoute(['/source/monetization/update','id'=>$type->id]);?>" title="Update" aria-label="Update"><span class="fa fa-pencil"></span></a>
                                <a href="<?= Url::toRoute(['/source/monetization/delete','id'=>$type->id]);?>" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

    <?php endif;?>
    </div>
</div>