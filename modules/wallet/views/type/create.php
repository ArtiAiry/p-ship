<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\wallet\models\WalletType */

$this->title = 'Create Wallet Type';
$this->params['breadcrumbs'][] = ['label' => 'Wallet Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wallet-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
