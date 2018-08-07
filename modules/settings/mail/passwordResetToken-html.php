<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user app\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['settings/change-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Доброго времени суток, <?= Html::encode($user->username) ?>,</p>

    <p>Следуйте по ссылке для того, чтобы указать новый пароль:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
