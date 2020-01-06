<?php

use app\modules\product\Module;
use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $products app\modules\product\models\Product */

$this->title = $heading;
$this->params['breadcrumbs'][] = ['label' => Module::t('product', 'Products'), 'url' => ['/product']];
$this->params['breadcrumbs'][] = $this->title;

?>
    <div class="product-view">
        <div class="card fade-out">
            <div class="card-body">
                <h1><?= Html::encode($this->title) ?></h1>
                <?php if (!empty($products)): ?>
                    <table id="min-table" class="table table-hover table-bordered dt-responsive nowrap"
                           style="width:100%">
                        <thead>
                        <tr>
                            <td><?= Module::t('product', 'ID') ?></td>
                            <td><?= Module::t('product', 'Product Name') ?></td>
                            <td><?= Module::t('product', 'Description') ?></td>
                            <td><?= Module::t('product', 'Price') ?></td>
                            <td><?= Module::t('product', 'Partner\'s Link') ?></td>
                            <td><?= Module::t('product', 'Banners') ?></td>
                            <td><?= Module::t('product', 'Videos') ?></td>
                            <td><?= Module::t('product', 'Actions') ?></td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?= $product->id ?></td>
                                <td><?= $product->name ?></td>
                                <td><?= $product->description ?></td>
                                <td><?= $product->price ?></td>
                                <td><label class="badge badge-primary"><?= $product->getBuildUrl(); ?></label> <a
                                            class="btn btn-outline-primary btn-xs mt-1 mb-1"
                                            data-clipboard-text="<?= $product->getBuildUrl(); ?>"><?= Module::t('product', 'Copy') ?></a></td>
                                <td><a href="<?= $product->banner_url ?>" class="btn btn-primary download-banner"
                                       download="banners.rar"><?= Module::t('product', 'Banner\'s link') ?></a></td>
                                <td><a href="<?= Url::toRoute(['/product/video', 'id' => $product->id]); ?>"
                                       class="btn btn-primary download-banner media-modal-click">
                                        <?= Module::t('product', 'Banner\'s video') ?></a></td>

                                <td>
                                    <button value="<?= Url::toRoute(['/product/view', 'id' => $product->id]); ?>"
                                            data-toggle="tooltip" title="<?= Module::t('product', 'View') ?>"
                                            aria-label="View"
                                            class="btn btn-outline-dark btn-rounded btn-xs view-modal-click"><span
                                                class="fa fa-eye"></span></button>
                                    <a href="<?= Url::toRoute(['/product/edit', 'id' => $product->id]); ?>"
                                       data-toggle="tooltip" title="<?= Module::t('product', 'Update') ?>"
                                       aria-label="Update"
                                       class="btn btn-outline-dark btn-rounded btn-xs update-modal-click"><span
                                                class="fa fa-pencil"></span></a>
                                    <a href="<?= Url::toRoute(['/product/remove', 'id' => $product->id]); ?>"
                                       data-toggle="tooltip" title="<?= Module::t('product', 'Delete') ?>"
                                       aria-label="Delete" data-confirm="<?= Module::t('product',
                                        'Are you sure you want to delete this item?') ?>"
                                       class="btn btn-outline-dark btn-rounded btn-xs" data-method="post"><span
                                                class="fa fa-trash"></span></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php
Modal::begin([
    'header' => '<h4>' . Module::t('product', 'View Product') . '</h4>',
    'id' => 'view-modal',
    'size' => 'modal-md',
]);
echo "<div id='viewModalContent'></div>";
Modal::end();
?>