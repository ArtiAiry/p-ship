<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\form\PasswordResetRequestForm */

use app\assets\PublicAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;


PublicAsset::register($this);

$this->title = Yii::t('app','Request Reset Password');

$this->params['breadcrumbs'][] = $this->title;
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<?php $this->beginBody() ?>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth reset-full-bg">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <h1 class="h-center"><?= Yii::t('app','Request Reset Password') ?></h1>
                        <h4 class="font-weight-normal h-center"><?= Yii::t('app','Please fill out your email. A link to reset password will be sent there.') ?></h4>
                        <?php
                        $form = ActiveForm::begin([
                            'id' => 'request-password-reset-form',
                            'layout' => 'horizontal',
                            'options' => [
                                'class' => 'pt-4',
                            ],
                            'fieldConfig' => [
                                'template' => "{label}\n{input}\n<div class=\"custom-error\">{error}</div>",
                                'labelOptions' => ['class' => '','for'=>''],
                            ],
                        ]);

                        ?>

                        <div class="form-group">
                            <!--                                    <label for="exampleInputEmail1">Username</label>-->
                            <!--                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">-->
                            <?= $form->field($model, 'email')->textInput(['class'=>'form-control', 'autofocus' => true,'placeholder'=>Yii::t('app','Enter Email')])->label(Yii::t('app','Email')) ?>
                        </div>
                        <div class="mt-5">
                            <?= Html::submitButton(Yii::t('app','Send'), ['class' => 'btn btn-block btn-dark btn-lg font-weight-medium']) ?>
                        </div>
                        <div class="mt-3 text-center">
                            <a href="<?= Url::to(['auth/login'])?>" class="auth-link text-dark"><?= Yii::t('app','Back to the main page') ?></a>
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
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


