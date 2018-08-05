<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\form\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app','Ask Question');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-body">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Yii::t('app','If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.') ?>
    </p>

    <div class="row">
        <div class="col-lg-12">

            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <?= $form->field($model, 'subject') ?>

            <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app','Send'), ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>

