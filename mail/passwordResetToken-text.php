<?php

/* @var $this yii\web\View */
/* @var $user app\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['auth/change', 'token' => $user->password_reset_token]);
?>
Доброго времени суток, <?= $user->username ?>,

Следуйте по ссылке для того, чтобы указать новый пароль:

<?= $resetLink ?>
