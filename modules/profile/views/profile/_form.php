<?php

use app\models\Profile;
use app\modules\profile\Module;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $profile app\modules\profile\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($profile, 'first_name')->textInput(['maxlength' => true, 'placeholder' => Module::t('profile','Enter First Name')]) ?>

    <?= $form->field($profile, 'last_name')->textInput(['maxlength' => true, 'placeholder' => Module::t('profile','Enter Last Name')]) ?>

    <?= $form->field($profile, 'skype')->textInput(['maxlength' => true, 'placeholder' => Module::t('profile','Enter Your Skype')]) ?>

    <?= $form->field($profile, 'phone')->textInput(['placeholder' => Module::t('profile','Enter Your Phone Number')]) ?>

    <?= $form->field($profile, 'whatsapp')->textInput(['maxlength' => true, 'placeholder' => Module::t('profile','Enter Your WhatsApp')]) ?>

    <?= $form->field($profile, 'telegram')->textInput(['maxlength' => true, 'placeholder' => Module::t('profile','Enter Your Telegram, example: @example or phone number')]) ?>

    <div class="form-group">
        <?= Html::submitButton(Module::t('profile','Save'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
