<?php

use app\modules\product\Module;
use app\modules\profile\models\Profile;
use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('product', 'Products');
$this->params['breadcrumbs'][] = $this->title;


?>
<?php
digitv\bootstrap\widgets\Modal::begin([
    'header' => '<h4>' . Module::t('product', 'Adding a Product') . '</h4>',
    'id' => 'modal1',
    'size' => 'modal-md',
]);
echo "<div id='modalContent1' class='card'></div>";
digitv\bootstrap\widgets\Modal::end();
?>
    <div class="card fade-out">
        <div class="card-body">
            <h1><?= Html::encode($this->title) ?>
                <?php if ($profile->user->getRole() == 'admin'): ?>
                    <button value="<?= Url::to(['/product/create']) ?>" class="btn btn-outline-primary"
                            id="modalButton1" data-toggle="tooltip" data-placement="bottom"
                            title="<?= Module::t('product', 'Add Product') ?>">
                        <?= Module::t('product', 'Create') ?>
                    </button>
                <?php endif; ?>
            </h1>

            <?php if (!empty($companies)): ?>
                <table id="min-table" class="table table-hover table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <td><?= Module::t('product', '#') ?></td>
                        <td><?= Module::t('product', 'Company') ?></td>
                        <td><?= Module::t('product', 'Offers') ?></td>
                        <td><?= Module::t('product', 'Actions') ?></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($companies as $company): ?>
                        <tr>
                            <td><?= $company->id ?></td>
                            <td><?= $company->name ?></td>
                            <td><?= $company->getCompanyProductsCount($company->id) ?></td>
                            <td>
                                <button value="<?= Url::toRoute(['/company/view', 'id' => $company->id]); ?>"
                                        data-toggle="tooltip" title="<?= Module::t('product', 'info') ?>"
                                        aria-label="Info"
                                        class="btn btn-outline-dark btn-rounded btn-xs view-modal-click"><?= Module::t('product',
                                        'info') ?></button>
                                <a href="<?= Url::toRoute(['/product/company', 'name' => $company->name]); ?>"
                                   data-toggle="tooltip" title="<?= Module::t('product', 'go to products') ?>"
                                   aria-label="Go to products"
                                   class="btn btn-outline-dark btn-rounded btn-xs update-modal-click"><?= Module::t('product',
                                        'go to products') ?></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
<?php
Modal::begin([
    'header' => '<h4>' . Module::t('product', 'View Company') . '</h4>',
    'id' => 'view-modal',
    'size' => 'modal-md',
]);
echo "<div id='viewModalContent'></div>";
Modal::end();
?>