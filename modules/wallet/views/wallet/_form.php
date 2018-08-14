<?php

use app\models\User;
use app\modules\profile\models\Profile;
use app\modules\wallet\models\WalletType;
use app\modules\wallet\Module;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;

/* @var $this yii\web\View */
/* @var $model app\modules\wallet\models\Wallet */
/* @var $form yii\widgets\ActiveForm */

$profile = Profile::findOne(Yii::$app->user->id);

?>

<div class="wallet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'wallet_type_id')->dropDownList(ArrayHelper::map(WalletType::find()->all(), 'id', 'name'),['prompt'=> Module::t('wallet','Choose a Main Wallet')]); ?>

    <?= $form->field($model, 'yandex_money')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qiwi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'webmoney_wmr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paypal_eur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sberbank_rub')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pb_uah')->textInput(['maxlength' => true]) ?>

    <?php if($profile->user->getRole() == 'admin'): ?>

    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User::find()->all(), 'id', 'username'),['prompt'=> Module::t('wallet','Choose User')]); ?>

    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton(Module::t('wallet','Create'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
