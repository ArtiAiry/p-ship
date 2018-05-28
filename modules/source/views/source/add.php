<?php

use app\models\User;
use app\modules\product\models\Product;
use app\modules\source\models\MonetizationType;
use app\modules\source\models\SourceType;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\form\addSourceForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="source-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'source_type_id')->dropDownList(ArrayHelper::map(SourceType::find()->all(), 'id', 'name'),['prompt'=>'Choose a Source Type']); ?>

    <?= $form->field($model, 'product_id')->dropDownList(ArrayHelper::map(Product::find()->all(), 'id', 'name'),['prompt'=>'Choose a Product']); ?>

    <?= $form->field($model, 'monetization_type_id')->dropDownList(ArrayHelper::map(MonetizationType::find()->all(), 'id', 'name'),['prompt'=>'Choose a Monetization Type']); ?>

    <div class="form-group">
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
