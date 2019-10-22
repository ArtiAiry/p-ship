<?php

use app\modules\profile\Module;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\profile\models\Profile */

$this->title = $model->user->username;
$this->params['breadcrumbs'][] = ['label' => Module::t('profile','Profiles'), 'url' => ['/profile']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="card-body">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('profile','Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Module::t('profile','Delete'), ['/remove', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Module::t('profile','Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user.username',
            'user.email:email',
            'skype',
            'phone',
            'telegram',
            'whatsapp',
        ],
    ]) ?>
    </div>
</div>
