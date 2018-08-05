<?php

use app\modules\leads\Module;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\leads\models\ClicksLeads */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Module::t('leads','Leads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clicks-leads-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('leads','Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Module::t('leads','Delete'), ['remove', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Module::t('leads','Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_device',
            'user_os',
            'source',
            'product.name',
            'leadsStatus.name',
            'price',
            'isSold',
            'created_at',
        ],
    ]) ?>

</div>
