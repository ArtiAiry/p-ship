<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $source app\modules\source\models\Source */

$this->title = $source->name;
$this->params['breadcrumbs'][] = ['label' => 'Sources', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-view">

    <h1><?= Html::encode($this->title) ?> </h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $source->id], ['class' => 'btn btn-outline-primary btn-xs']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $source->id], [
            'class' => 'btn btn-outline-danger btn-xs',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <a class="btn btn-outline-primary btn-xs" data-clipboard-text="<?= $source->getBuildUrl(); ?>">Copy URL</a>
    </p>
    <table class="table table-bordered">
        <tbody>
                <tr>
                    <th>ID</th>
                    <td><?= $source->id ?></td>
                </tr>
                <tr>
                    <th>Source</th>
                    <td><?= $source->name ?></td>
                </tr>
                <tr>
                    <th>Source Type</th>
                    <td><?= $source->sourceType->name ?></td>
                </tr>
                <tr>
                    <th>Affliante</th>
                    <td><?= $source->user->username ?></td>
                </tr>
                <tr>
                    <th>Product</th>
                    <td><?= $source->product->name ?></td>
                </tr>
                <tr>
                    <th>Monetization Type</th>
                    <td><?= $source->monetizationType->name ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><?= $source->sourceStatus->name ?></td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td><?= $source->created_at ?></td>
                </tr>
<!--                <tr>-->
<!--                    <th>Source URL</th>-->
<!--                    <td><badge class="badge badge-primary">--><?//= $source->getBuildUrl() ?><!--</badge> <a class="badge badge-primary clipboard"><i class="fa fa-copy"></i></a></td>-->
<!--                </tr>-->
        </tbody>
    </table>

</div>
