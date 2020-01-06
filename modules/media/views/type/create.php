<?php

use app\modules\media\Module;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\media\models\MediaType */

$this->title =  Module::t('type', 'Add Media\'s Type');
$this->params['breadcrumbs'][] = ['label' => Module::t('type', 'Media Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
