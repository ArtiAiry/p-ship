<?php

use app\modules\company\Module;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\company\models\Company */

$this->title = Module::t('','Update Company: ') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('company','Companies'), 'url' => ['/company']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('company','Update');
?>
<div class="company-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
