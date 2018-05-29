<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Monetization Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
digitv\bootstrap\widgets\Modal::begin([
    'header'=>'<h4>'. "Add Monetization Type" .'</h4>',
    'id'=>'modal1',
    'size'=>'modal-md',
]);
echo "<div id='modalContent1' class='card'></div>";
digitv\bootstrap\widgets\Modal::end();
?>

<div class="card fade-out">

    <?php if(!empty($monetizations)): ?>
        <div class="card-body">
            <h1><?= Html::encode($this->title) ?>
                <button value="<?= Url::to(['create']) ?>" class="btn btn-outline-primary" id="modalButton1" data-toggle="tooltip" data-placement="bottom"  title="Add Monetization Type">
                    Create
                </button>
            </h1>
            <div class="table-responsive">

                <table id="min-table" class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($monetizations as $monetization):?>
                        <tr>
                            <td><?= $monetization->id ?></td>
                            <td><?= $monetization->name ?></td>
                            <td>
                                <a href="<?= Url::toRoute(['/source/monetization/view','id'=>$monetization->id]);?>" title="View" aria-label="View"><span class="fa fa-eye"></span></a>
                                <a href="<?= Url::toRoute(['/source/monetization/update','id'=>$monetization->id]);?>" title="Update" aria-label="Update"><span class="fa fa-pencil"></span></a>
                                <a href="<?= Url::toRoute(['/source/monetization/delete','id'=>$monetization->id]);?>" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif;?>


</div>
