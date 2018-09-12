<?php

use app\modules\product\Module;
use app\modules\profile\models\Profile;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('product','Products');
$this->params['breadcrumbs'][] = $this->title;


?>
<?php
digitv\bootstrap\widgets\Modal::begin([
    'header'=>'<h4>'. Module::t('product','Adding a Product') .'</h4>',
    'id'=>'modal1',
    'size'=>'modal-md',
]);
echo "<div id='modalContent1' class='card'></div>";
digitv\bootstrap\widgets\Modal::end();
?>

<h1 class="h-center"><?= Html::encode($this->title)?>
    <?php if($profile->user->getRole() == 'admin'): ?>
    <button value="<?= Url::to(['/product/create']) ?>" class="btn btn-outline-primary" id="modalButton1" data-toggle="tooltip" data-placement="bottom"  title="<?=  Module::t('product','Add Product') ?>">
        <?= Module::t('product','Create')?>
    </button>
    <?php endif; ?>
</h1>

<div class="card-deck">
    <div class="owl-carousel owl-theme" id="carusel1">
        <?php foreach($products as $product):?>
            <div class="item">
                <div class="card custom">
                    <div class="zoom">
                        <img class="card-img-top" src="<?= $product->logo_url ?>" alt="Card image cap">
                    </div>
                    <div class="card-body h-center">

                        <h3 class="card-title">
                             <?= $product->name ?>
                        </h3>
                        <p class="card-text"><?= $product->description ?>
                        <p class="card-text"><?= $product->price ?> <span class="currency-mark"><i class="mdi mdi-currency-rub"></i></span></p>
                        <p class="card-text"><a href="<?= $product->getBuildUrl(); ?>"><badge class="badge badge-primary"><?= $product->getBuildUrl(); ?></badge></a> <a class="btn btn-outline-primary btn-xs mt-1 mb-1" data-clipboard-text="<?= $product->getBuildUrl(); ?>">Копировать</a></p>
                                <a href="<?= $product->banner_url ?>" class="btn btn-primary" download="banners.rar"><?= Module::t('product','Banner\'s link')?></a>
            <?php if($profile->user->getRole() == 'admin'): ?>
                                <a href="<?= Url::toRoute(['/product/update','id'=>$product->id]);?>" data-toggle="tooltip"  title="<?= Module::t('product','Update')?>" aria-label="Update" class="btn btn-outline-primary btn-md mt-1 mb-1"><span class="fa fa-pencil" ></span></a>
            <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
