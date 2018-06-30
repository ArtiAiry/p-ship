<?php

use app\modules\leads\Module;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\leads\models\LeadsStatus */

$this->title = Module::t('status','Create Status');
$this->params['breadcrumbs'][] = ['label' => Module::t('status','Statuses'), 'url' => ['/leads/status/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
