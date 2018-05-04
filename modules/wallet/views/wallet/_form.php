<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\wallet\models\Wallet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wallet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'payout_type_id')->textInput() ?>

    <?= $form->field($model, 'yandex_money')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qiwi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'webmoney_wmr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paypal_eur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sberbank_rub')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'isMain')->textInput() ?>

    <?= $form->field($model, 'isRemoved')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
