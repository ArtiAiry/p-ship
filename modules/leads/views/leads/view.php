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

    <?php if($profile->user->getRole() == 'admin'): ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'crm_id',
            'user_device',
            'user_os',
            'source',
            'country',
            'city',
            'product.name',
            'leadsStatus.name',
            'price',
            'created_at',
        ],
    ]) ?>

    <?php else: ?>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'user_device',
                'user_os',
                'source',
                'country',
                'city',
                'product.name',
                'leadsStatus.name',
                'price',
                'created_at',
            ],
        ]) ?>

    <?php endif; ?>

</div>
