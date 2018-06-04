<?php

use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Leads';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card fade-out">
    <div class="card-body">
        <h1><?= Html::encode($this->title)?>

            <button value="<?= Url::to(['/leads/create']) ?>" class="btn btn-outline-primary" id="modalButton1" data-toggle="tooltip" data-placement="bottom"  title="Add Lead">
                Create
            </button>
        </h1>
        <?php if(!empty($leads)): ?>
        <div class="table-responsive">
            <table id="extended-table" class="table table-hover table-bordered">
                <thead>
                <tr>
                    <td>Product</td>
                    <td>Source</td>
                    <td>Amount of Leads</td>
                    <td>Unknown</td>
                    <td>Rejected</td>
                    <td>Approved</td>
                    <td>Sold</td>
                    <td>Summary</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach($leads as $lead):?>
                    <!--                --><?php //if($profile->user->getRole() == 'teacher'): ?>
                    <tr>
                        <td><?= $lead->product->name ?></td>
                        <td><?= $lead->source ?></td>
                        <td><?= $lead->count_lead ?> </td>
                        <td><?= $lead->count_status_unknown ?> </td>
                        <td><?= $lead->count_status_rejected ?> </td>
                        <td><?= $lead->count_status_approved ?> </td>
                        <td><?= $lead->count_status_sold ?></td>
                        <td><?= $lead->sum_lead_sold_summary ?></td>
                        <!--                            <td>--><?//= $profile->whatsapp ?><!--</td>-->
                        <!--                        <td>--><?//= $profile->user->getRole() ?><!--</td>-->
                    </tr>
                    <!--                --><?php //endif; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif;?>
</div>

