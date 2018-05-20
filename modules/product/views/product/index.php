<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
digitv\bootstrap\widgets\Modal::begin([
    'header'=>'<h4>'. "Add Product" .'</h4>',
    'id'=>'modal1',
    'size'=>'modal-md',
]);
echo "<div id='modalContent1' class='card'></div>";
digitv\bootstrap\widgets\Modal::end();
?>
<h1 class="h-center"><?= $this->title ?>
    <button value="<?= Url::to(['create']) ?>" class="btn btn-outline-primary" id="modalButton1" data-toggle="tooltip" data-placement="bottom"  title="Add Product">
        Create
    </button>
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

                            <li class="list-group-item">CPL price:  <?= $product->cpl_price ?></li>
                            <li class="list-group-item">CPS price: <?= $product->cps_price ?></li>
                            <li class="list-group-item">
                                <a href="#" class="btn btn-primary">Create Source</a>
                                <a href="<?= $product->banner_url ?>" class="btn btn-primary" download="banners.rar">Banner link</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>

        <?php endforeach; ?>

    </div>


    <!--    <div class="owl-controls">-->
    <!--        <div class="owl-nav">-->
    <!--            <button  id="who-are-we" class="prvBtn btn-btn primary btn-lg"><i class="fa fa-leaf"></i></button>-->
    <!--            <button id="who-are-we"  class="nxtBtn btn-btn primary btn-lg"><i class="fa fa-leaf"></i></button>-->
    <!--        </div>-->
    <!--    </div>-->

</div>