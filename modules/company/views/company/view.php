<?php

use app\modules\company\Module;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\company\models\Company */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('company','Companies'), 'url' => ['/company']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="company-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(Module::t('company','Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Module::t('company','Delete'), ['remove', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Module::t('company','Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'info:ntext',
        ],
    ]) ?>
</div>

