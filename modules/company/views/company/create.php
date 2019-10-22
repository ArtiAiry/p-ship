<?php

use app\modules\company\Module;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\company\models\Company */

$this->title = Module::t('company','Create Company');
$this->params['breadcrumbs'][] = ['label' => Module::t('company','Companies'), 'url' => ['/company']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
