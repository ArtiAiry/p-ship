<?php

use app\modules\payout\Module;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\payout\models\PayoutStatus */

$this->title = Module::t('status','Update Status: ') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('status','Statuses'), 'url' => ['/payout/status/index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('status',Module::t('status','Update'));
?>
<div class="status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
