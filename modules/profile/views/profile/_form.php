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

    <?= $form->field($profile, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($profile, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($profile, 'skype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($profile, 'phone')->textInput() ?>

    <?= $form->field($profile, 'whatsapp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($profile, 'telegram')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Module::t('profile','Save'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
