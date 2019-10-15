<?php

use app\modules\wallet\Module;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\wallet\models\Wallet */

//$this->title = Module::t('wallet','Update Wallet: ') . $model->id;
$this->title = Module::t('wallet','Edit Wallet');
$this->params['breadcrumbs'][] = ['label' =>  Module::t('wallet','Wallets'), 'url' => ['/wallet']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('wallet','Update');
?>
<div class="col-md-6 d-flex align-items-stretch grid-margin">
    <div class="card">
        <div class="card-body">

            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>