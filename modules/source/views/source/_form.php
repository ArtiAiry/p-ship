<?php

use app\models\User;
use app\modules\product\models\Product;
use app\modules\source\models\MonetizationType;
use app\modules\source\models\SourceType;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\source\models\Source */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="source-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'source_type_id')->dropDownList(ArrayHelper::map(SourceType::find()->all(), 'id', 'name'),['prompt'=>'Choose a Source Type']); ?>

    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User::find()->all(), 'id', 'username'),['prompt'=>'Choose a User']); ?>

    <?= $form->field($model, 'product_id')->dropDownList(ArrayHelper::map(Product::find()->all(), 'id', 'name'),['prompt'=>'Choose a Product']); ?>

    <?= $form->field($model, 'monetization_type_id')->dropDownList(ArrayHelper::map(MonetizationType::find()->all(), 'id', 'name'),['prompt'=>'Choose a Monetization Type']); ?>

    <?= $form->field($model, 'source_status_id')->dropDownList(ArrayHelper::map(\app\modules\source\models\SourceStatus::find()->all(), 'id', 'name'),['prompt'=>'Choose Status']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
