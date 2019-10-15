<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\settings\models\form\ResetEmailForm */

use app\modules\settings\Module;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title =  Module::t('settings','Change Email');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-email">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Module::t('settings','Please choose your new email:') ?></p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'reset-email-form']); ?>

            <?= $form->field($model, 'email')->textInput(['class'=>'form-control', 'autofocus' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton(Module::t('settings','Save'), ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>