<?php

use app\models\User;
use app\modules\payout\models\PayoutStatus;
use app\modules\payout\Module;
use app\modules\wallet\models\WalletType;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\payout\models\Payout */
/* @var $form yii\widgets\ActiveForm */


?>

<?php $items = $model->getCurrencyList(); ?>

<div class="payout-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'wallet_type_id')->dropDownList(ArrayHelper::map(WalletType::find()->all(), 'id', 'name'),['prompt'=>Module::t('payout','Choose Wallet')]); ?>

    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User::find()->all(), 'id', 'username'),['prompt'=>Module::t('payout','Choose User')]); ?>

    <?= $form->field($model, 'payout_sum')->textInput() ?>

    <?= $form->field($model, 'payout_currency')->dropDownList($items) ?>

    <?= $form->field($model, 'payout_sum_rub')->textInput() ?>

    <?= $form->field($model, 'payout_status_id')->dropDownList(ArrayHelper::map(PayoutStatus::find()->all(), 'id', 'name'),['prompt'=>Module::t('payout','Choose Payout Status')]);  ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Module::t('payout','Create') : Module::t('payout','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
