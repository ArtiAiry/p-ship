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
                    <td>#</td>
                    <td>Source</td>
                    <td>IP</td>
                    <td>User Device</td>
                    <td>User OS</td>
                    <td>Username</td>
                    <td>Product</td>
                    <td>Status</td>
                    <td>Price</td>
                    <td>Created At</td>
                    <td>Amount of Leads</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach($leads as $lead):?>
                    <!--                --><?php //if($profile->user->getRole() == 'teacher'): ?>
                    <tr>
                        <td><?= $lead->id ?></td>
                        <td><?= $lead->source ?></td>
                        <td><?= $lead->ip ?></td>
                        <td><?= $lead->user_device ?></td>
                        <td><?= $lead->user_os ?></td>
                        <td><?= $lead->user->username ?></td>
                        <td><?= $lead->product->name ?></td>
                        <td><?= $lead->leadsStatus->name ?></td>
                        <td><?= $lead->price ?></td>
                        <td><?= $lead->created_at ?></td>

                        <td><?= $lead->count ?> </td>
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

