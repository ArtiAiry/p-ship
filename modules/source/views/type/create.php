<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\source\models\SourceType */

$this->title = 'Create Source Type';
$this->params['breadcrumbs'][] = ['label' => 'Source Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="source-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
