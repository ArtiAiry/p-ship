<?php

use app\modules\payout\Module;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\payout\models\Payout */

$this->title = Module::t('payout','Create Payout');
$this->params['breadcrumbs'][] = ['label' => Module::t('payout','Payouts'), 'url' => ['/payout']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payout-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
