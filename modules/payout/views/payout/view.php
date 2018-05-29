<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\payout\models\Payout */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Payouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payout-view">

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
            'walletType.name',
            'user.username',
            'payout_sum',
            [
                'label'  => 'Gender',
                'value'  => function ($data) {
                    if ($data->payout_currency == 1) {
                        return 'RUB';
                    } elseif ($data->payout_currency == 2) {
                        return 'USD';
                    } elseif ($data->payout_currency == 3) {
                        return 'UAH';
                    } elseif ($data->payout_currency == 4) {
                        return 'EUR';
                    } else {
                        return 'Not Set';
                    }
                }
            ],

            'payout_sum_rub',
            'payoutStatus.name',
            'comment',
            'created_at',
        ],
    ]) ?>

</div>
