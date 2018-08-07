<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\form\ResetPasswordForm */

use app\assets\PublicAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

PublicAsset::register($this);

$this->title = Yii::t('app','Change Password');
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
                        <h1 class="h-center"><?= Yii::t('app','Change Password') ?></h1>
                        <h4 class="font-weight-normal h-center"><?= Yii::t('app','Please choose your new password:') ?></h4>
                        <?php $form = ActiveForm::begin([
                            'id' => 'reset-password-form',
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
                        <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'repeat_password')->passwordInput(['autofocus' => true]) ?>
                        </div>
                        <div class="mt-5">
                            <?= Html::submitButton(Yii::t('app','Save'), ['class' => 'btn btn-block btn-dark btn-lg font-weight-medium']) ?>
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

