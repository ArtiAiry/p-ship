<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\form\SignupForm */

use app\assets\PublicAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

PublicAsset::register($this);

$this->title = Yii::t('app','Sign Up');
$this->params['breadcrumbs'][] = $this->title;

?>



<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <!-- Required meta tags -->
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth register-full-bg">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <h2><?= Yii::t('app','Sign Up')?></h2>
                        <h4 class="font-weight-light"><?= Yii::t('app','Hello! let\'s get started')?></h4>

                                <?php $form = ActiveForm::begin([
                                                    'id' => 'signup-form',
                                                    'layout' => 'horizontal',
                                                    'options' => [
                                                            'class' => 'pt-4',
                                                    ],
                                                    'fieldConfig' => [
                                                        'template' => "{label}\n{input}\n<div class=\"custom-error\">{error}</div>",
                                                        'labelOptions' => ['class' => '','for'=>''],
                                                    ],
                                                ]); ?>

                                <div class="form-group">
                                    <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class'=>'form-control', 'placeholder'=>Yii::t('app','Your Username')]) ?>
                                </div>

                                <div class="form-group">
                                    <?= $form->field($model, 'email')->textInput(['class'=>'form-control', 'placeholder'=>Yii::t('app','Your Email')]) ?>
                                </div>
                                <div class="form-group">
                                    <?= $form->field($model, 'password_hash')->passwordInput(['class'=>'form-control','placeholder'=>Yii::t('app','Your Password')]) ?>
                                </div>
                                <div class="form-group">
                                    <?= $form->field($model, 'repeat_password')->passwordInput(['placeholder'=>Yii::t('app','Confirm Password')]) ?>
                                </div>
                                <div class="mt-5">
                                    <?= Html::submitButton(Yii::t('app','Register'), ['class' => 'btn btn-block btn-primary btn-lg font-weight-medium', 'name' => 'login-button']) ?>
                                </div>
                                <div class="mt-2 w-75 mx-auto">
                                    <div class="form-check form-check-flat">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input">
                                            <?= Yii::t('app','I accept terms and conditions') ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-2 text-center">
                                    <a href="<?= \yii\helpers\Url::to(['/auth/login']) ?>" class="auth-link text-black"><?= Yii::t('app','Already have an account?') ?><span class="font-weight-medium"><?= Yii::t('app','Sign In') ?></span></a>
                                </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>

        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

<!-- container-scroller -->
<!-- plugins:js -->
<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>



