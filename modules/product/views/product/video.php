<?php

use app\modules\company\Module;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\product\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('company', 'Products'), 'url' => ['/product']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <a href="<?= Url::toRoute(['/settings']); ?>"
          class="btn btn-primary download-banner" download="banners.rar">
            <?= Module::t('product', 'Widescreen') ?></a>
    </p>
    <p>
        <video width="320" height="240" controls="" name="media">
                <source src="/videos/Wildlife.mp4" type="video/mp4">
            <source src="/videos/Wildlife.ogg" type="video/ogg">
            Your browser does not support the video tag.
        </video>
    </p>
</div>
<div class="product-view">
    <p><a href="<?= Url::toRoute(['/product/video', 'id' => $model->id]); ?>"
          class="btn btn-primary download-banner" download="banners.rar">
            <?= Module::t('product', 'Mobile for stories') ?></a></p>
    <p><video width="320" height="240" controls="" name="media">
                <source src="/videos/Wildlife.mp4" type="video/mp4">
            <source src="/videos/Wildlife.ogg" type="video/ogg">
            Your browser does not support the video tag.
        </video></p>
</div>

<div class="product-view">
    <p><a href="<?= Url::toRoute(['/product/video', 'id' => $model->id]); ?>"
          class="btn btn-primary download-banner" download="banners.rar">
            <?= Module::t('product', 'Banner\'s video') ?></a></p>
    <p><video width="320" height="240" controls="" name="media">
                <source src="/videos/Wildlife.mp4" type="video/mp4">
            <source src="/videos/Wildlife.ogg" type="video/ogg">
            Your browser does not support the video tag.
        </video></p>
</div>