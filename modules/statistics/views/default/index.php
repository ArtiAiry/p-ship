<?php

use app\modules\statistics\Module;
use yii\helpers\Url;

?>

<div class="statistics-default-index">
    <h1 class="h-center"><?= Module::t('statistics','Statistics') ?></h1>
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 grid-margin stretch-card">
            <div class="card custom bg-dark text-white" style="width: 18rem;">
                <div class="zoom img-overlay">
                    <img class="card-img-top" src="/images/statistics/site-bg-product.png" alt="Card image cap">
                    <a href="<?= Url::to(['/statistics/goods']) ?>">
<!--                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">-->
<!--                            <h5 class="card-title">--><?//= Module::t('statistics','By Products') ?><!--</h5>-->
<!--                            <p class="card-text">--><?//= Module::t('statistics','Amount of Leads, group by product.') ?><!--</p>-->
<!--                        </div>-->
                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                            <div class="my-auto mx-auto text-center">
                                <!--                                <h4 class="card-title">--><?//= Module::t('statistics','Statistics') ?><!--</h4>-->
                                <h1 class="text"><?= Module::t('statistics','By Products') ?></h1>
                                <h4 class="text"><?= Module::t('statistics','Amount of Leads, group by product.') ?></h4>
                            </div>
                        </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 grid-margin stretch-card">
            <div class="card custom bg-dark text-white" style="width: 18rem;">
                <div class="zoom img-overlay">
                    <img class="card-img-top" src="/images/statistics/site-bg-source.png" alt="Card image cap">
                    <a href="<?= Url::to(['/statistics/source']) ?>">
<!--                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">-->
<!--                            <h5 class="card-title">--><?//= Module::t('statistics','By Sources') ?><!--</h5>-->
<!--                            <p class="card-text">--><?//= Module::t('statistics','Amount of Leads, group by source.') ?><!--</p>-->
<!--                        </div>-->
                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                            <div class="my-auto mx-auto text-center">
<!--                                <h4 class="card-title">--><?//= Module::t('statistics','Statistics') ?><!--</h4>-->
                                <h1 class="text"><?= Module::t('statistics','By Sources') ?></h1>
                                <h4 class="text"><?= Module::t('statistics','Amount of Leads, group by source.') ?></h4>
                            </div>
                        </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 grid-margin stretch-card">
            <div class="card custom bg-dark text-white" style="width: 18rem;">
                <div class="zoom img-overlay">
                    <img class="card-img-top" src="/images/statistics/site-bg-date.png" alt="Card image cap">
                    <a href="<?= Url::to(['/statistics/date']) ?>">
<!--                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">-->
<!--                            <h5 class="card-title">--><?//= Module::t('statistics','By Date') ?><!--</h5>-->
<!--                            <p class="card-text">--><?//= Module::t('statistics','Amount of Leads, group by date.') ?><!--</p>-->
<!--                        </div>-->
                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                            <div class="my-auto mx-auto text-center">
                                <!--                                <h4 class="card-title">--><?//= Module::t('statistics','Statistics') ?><!--</h4>-->
                                <h1 class="text"><?= Module::t('statistics','By Date') ?></h1>
                                <h4 class="text"><?= Module::t('statistics','Amount of Leads, group by date.') ?></h4>
                            </div>
                        </div>
                </div>
            </div>
            </a>
        </div>
</div>