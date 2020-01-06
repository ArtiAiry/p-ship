<?php

use app\modules\media\Module;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\media\models\MediaType */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('type','Media Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-type-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('type','Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Module::t('type','Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Module::t('type','Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'isRemoved',
        ],
    ]) ?>

</div>
