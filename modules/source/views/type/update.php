<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\source\models\SourceType */

$this->title = 'Update Source Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Source Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="source-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
