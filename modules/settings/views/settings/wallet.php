<?php

use app\models\User;
use app\modules\wallet\models\WalletType;
use app\modules\wallet\Module;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;

/* @var $this yii\web\View */
/* @var $wallet app\modules\wallet\models\Wallet */
/* @var $form yii\widgets\ActiveForm */


$this->title = Module::t('wallet','Edit Wallet');
$this->params['breadcrumbs'][] = Module::t('wallet','Update');

?>
<div class="col-md-6 d-flex align-items-stretch grid-margin">
    <div class="card">
        <div class="card-body">

            <h1><?= Html::encode($this->title) ?></h1>

            <div class="wallet-form">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($wallet, 'wallet_type_id')->dropDownList(ArrayHelper::map(WalletType::find()->all(), 'id', 'name'),['prompt'=> Module::t('wallet','Choose a Main Wallet')]); ?>

                <?= $form->field($wallet, 'yandex_money')->textInput(['maxlength' => true]) ?>

                <?= $form->field($wallet, 'qiwi')->textInput(['maxlength' => true]) ?>

                <?= $form->field($wallet, 'webmoney_wmr')->textInput(['maxlength' => true]) ?>

                <?= $form->field($wallet, 'paypal_eur')->textInput(['maxlength' => true]) ?>

                <?= $form->field($wallet, 'sberbank_rub')->textInput(['maxlength' => true]) ?>

                <?= $form->field($wallet, 'pb_uah')->textInput(['maxlength' => true]) ?>

                <?= $form->field($wallet, 'user_id')->dropDownList(ArrayHelper::map(User::find()->all(), 'id', 'username'),['prompt'=> Module::t('wallet','Choose User')]); ?>


                <div class="form-group">
                    <?= Html::submitButton(Module::t('wallet','Save'), ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>
