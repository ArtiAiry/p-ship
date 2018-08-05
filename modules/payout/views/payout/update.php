<?php

use app\modules\payout\Module;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\payout\models\Payout */

$this->title = Module::t('payout','Update Payout: ') . $model->id;
$this->params['breadcrumbs'][] = ['label' => Module::t('payout','Payouts'), 'url' => ['/payout']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('payout','Update');
?>
<div class="payout-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
