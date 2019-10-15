<?php

use app\modules\statistics\Module;
use yii\helpers\Url;

$this->title = Module::t('statistics','Statistics');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="statistics-default-index">
    <h1 class="h-center"><?= Module::t('statistics','Statistics') ?></h1>
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 grid-margin stretch-card">
            <div class="card custom bg-dark text-white" style="width: 18rem;">
                <div class="zoom img-overlay">
                    <img class="card-img-top" src="/images/statistics/site-bg-product.png" alt="Card image cap">
                    <a href="<?= Url::to(['/statistics/goods']) ?>">
                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                            <div class="my-auto mx-auto text-center">
                                <h1 class="text"><?= Module::t('statistics','Products') ?></h1>
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
                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                            <div class="my-auto mx-auto text-center">
                                <h1 class="text"><?= Module::t('statistics','Sources') ?></h1>
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
                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                            <div class="my-auto mx-auto text-center">
                                <h1 class="text"><?= Module::t('statistics','Date') ?></h1>
                                <h4 class="text"><?= Module::t('statistics','Amount of Leads, group by date.') ?></h4>
                            </div>
                        </div>
                </div>
            </div>
            </a>
        </div>
</div>
</div>