<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\payout\models\PayoutSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payout-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'wallet_type_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'payout_sum') ?>

    <?= $form->field($model, 'payout_currency') ?>

    <?php // echo $form->field($model, 'payout_sum_rub') ?>

    <?php // echo $form->field($model, 'payout_status_id') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'isRemoved') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
