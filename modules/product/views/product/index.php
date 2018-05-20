<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\product\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
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
