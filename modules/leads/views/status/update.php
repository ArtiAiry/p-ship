<?php

use app\modules\leads\Module;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\leads\models\LeadsStatus */

$this->title = Module::t('status','Update Status: ') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('status','Statuses'), 'url' => ['/leads/status/index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('status','Update');
?>
<div class="status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
