<?php

use app\models\User;
use app\modules\leads\models\LeadsStatus;
use app\modules\product\models\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\leads\models\ClicksLeads */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clicks-leads-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_device')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_os')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User::find()->all(), 'id', 'username'),['prompt'=>'Choose User']);  ?>

    <?= $form->field($model, 'source')->textInput(['maxlength' => true]);  ?>

    <?= $form->field($model, 'product_id')->dropDownList(ArrayHelper::map(Product::find()->all(), 'id', 'name'),['prompt'=>'Choose a Product']); ?>

    <?= $form->field($model, 'leads_status_id')->dropDownList(ArrayHelper::map(LeadsStatus::find()->all(), 'id', 'name'),['prompt'=>'Choose a Lead Status']); ?>

    <?= $form->field($model, 'price')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
