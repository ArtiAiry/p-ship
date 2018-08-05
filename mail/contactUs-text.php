<?php

use app\modules\profile\models\Profile;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user app\models\User */
/* @var $profile app\modules\profile\models\Profile */

$profile = Profile::findOne(Yii::$app->user->id);
?>

<?= $body ?>

ID: <?= $profile->user->id ?>
Email: <?= $profile->user->email  ?>
Логин пользователя: <?= $profile->user->username ?>