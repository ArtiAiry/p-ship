<?php

use app\modules\leads\Module;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\leads\models\ClicksLeads */

$this->title = Module::t('leads','Create a Lead');
$this->params['breadcrumbs'][] = ['label' => Module::t('leads','Leads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clicks-leads-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
