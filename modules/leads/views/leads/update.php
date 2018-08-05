<?php

use app\modules\leads\Module;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\leads\models\ClicksLeads */

$this->title = Module::t('leads','Update Lead: ') . $model->id;
$this->params['breadcrumbs'][] = ['label' => Module::t('leads','Leads'), 'url' => ['/leads']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('leads','Update');
?>
<div class="clicks-leads-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
