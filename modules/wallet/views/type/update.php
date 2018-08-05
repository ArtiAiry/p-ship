<?php

use app\modules\wallet\Module;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\wallet\models\WalletType */

$this->title = Module::t('type','Update Wallet Type: ') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('type','Wallet Types'), 'url' => ['/wallet/type/index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('type','Update');
?>
<div class="wallet-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
