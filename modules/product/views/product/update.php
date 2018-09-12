<?php

use app\modules\product\Module;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\product\models\Product */

$this->title = Module::t('product','Update Product: ') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('product','Products'), 'url' => ['/product']];
$this->params['breadcrumbs'][] = Module::t('product','Update');
?>
<div class="product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
