<?php

use app\modules\wallet\Module;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\wallet\models\Wallet */

$this->title = Module::t('wallet','Create Wallet');
$this->params['breadcrumbs'][] = ['label' => Module::t('wallet','Wallets'), 'url' => ['/wallet']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wallet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
