<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\leads\models\ClicksLeads */

$this->title = 'Update Clicks Leads: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Clicks Leads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clicks-leads-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
