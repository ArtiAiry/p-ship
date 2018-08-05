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
                    <div class="card-body">

                        <h3 class="card-title">
                             <?= $product->name ?>
                        </h3>
                        <p class="card-text"><?= $product->description ?></p>
                        <ul class="list-group list-group-flush">

                            <li class="list-group-item"><?= Module::t('product','Price: ')?><?= $product->price ?></li>
                            <li class="list-group-item">
                                <a href="<?= $product->banner_url ?>" class="btn btn-primary" download="banners.rar"><?= Module::t('product','Banner\'s link')?></a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
