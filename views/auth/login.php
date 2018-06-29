<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\form\LoginForm */

use app\assets\PublicAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


PublicAsset::register($this);
$this->title = Yii::t('app','Log in');
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
        <div class="content-wrapper d-flex align-items-center auth login-full-bg">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-dark text-left p-5">
                        <h2><?= Yii::t('app','Log in') ?></h2>
                        <h4 class="font-weight-light"><?= Yii::t('app','Hello! let\'s get started') ?></h4>
                        <?php $form = ActiveForm::begin([
                                'id' => 'login-form',
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
<!--                                    <label for="exampleInputEmail1">Username</label>-->
<!--                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">-->
                                    <?= $form->field($model, 'login')->textInput(['class'=>'form-control','autofocus' => true,'placeholder'=>Yii::t('app','Enter Username or Email')]) ?>
                                </div>
                                <div class="form-group">
                                    <?= $form->field($model, 'password_hash')->passwordInput(['class'=>'form-control','placeholder'=>Yii::t('app','Enter Password')]) ?>
                                </div>
                                <div class="mt-5">
<!--                                    <a class="btn btn-block btn-warning btn-lg font-weight-medium" href="../../index.html">Login</a>-->
                                    <?= Html::submitButton(Yii::t('app','Log in '), ['class' => 'btn btn-block btn-warning btn-lg font-weight-medium', 'name' => 'login-button']) ?>
                                </div>
                                <div class="mt-3 text-center">
                                    <a href="#" class="auth-link text-white"><?= Yii::t('app','Forgot password?') ?></a>
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


<!---->
<!--<div class="site-login">-->
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <p>Please fill out the following fields to login:</p>-->
<!---->
<!--    --><?php //$form = ActiveForm::begin([
//        'id' => 'login-form',
//        'layout' => 'horizontal',
//        'fieldConfig' => [
//            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
//            'labelOptions' => ['class' => 'col-lg-1 control-label'],
//        ],
//    ]); ?>
<!---->
<!--    --><?//= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'password_hash')->passwordInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'rememberMe')->checkbox([
//        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
//    ]) ?>
<!---->
<!--    <div class="form-group">-->
<!--        <div class="col-lg-offset-1 col-lg-11">-->
<!--            --><?//= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    --><?php //ActiveForm::end(); ?>
<!--</div>-->
