<?php

use app\modules\wallet\Module;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\wallet\models\Wallet */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Module::t('wallet','Wallets'), 'url' => ['/wallet']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="card-body">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('wallet','Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Module::t('wallet','Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Module::t('wallet','Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'yandex_money',
            'qiwi',
            'webmoney_wmr',
            'paypal_eur',
            'sberbank_rub',
            'user.username',
        ],
    ]) ?>
    </div>
</div>
