<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\source\models\MonetizationType */

$this->title = 'Create Monetization Type';
$this->params['breadcrumbs'][] = ['label' => 'Monetization Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monetization-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
