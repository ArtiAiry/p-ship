<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\leads\models\ClicksLeads */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Clicks Leads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clicks-leads-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ip',
            'user_device',
            'user_os',
            'source_id',
            'source_type_id',
            'monetization_type_id',
            'product_id',
            'leads_status_id',
            'price',
            'isSold',
            'created_at',
        ],
    ]) ?>

</div>
