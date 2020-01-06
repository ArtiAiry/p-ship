<?php

use app\modules\media\Module;
use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\media\models\MediaTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('type', 'Media Types');
$this->params['breadcrumbs'][] = $this->title;

Modal::begin([
    'header' => '<h4>' . Module::t('type', 'Adding a Media Type') . '</h4>',
    'id' => 'modal1',
    'size' => 'modal-md',
]);
echo "<div id='modalContent1' class='card'></div>";
Modal::end();
?>
<div class="card fade-out">
    <div class="card-body">
        <h1><?= Html::encode($this->title) ?>
            <button value="<?= Url::to(['create']) ?>" class="btn btn-outline-primary" id="modalButton1"
                    data-toggle="tooltip" data-placement="bottom" title="<?= Module::t('type', 'Add Media\'s Type') ?>">
                <?= Module::t('type', 'Create') ?>
            </button>
        </h1>

        <?php if (!empty($types)): ?>
            <table id="min-table" class="table table-hover table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                <tr>
                    <td><?= Module::t('type', 'ID') ?></td>
                    <td><?= Module::t('type', 'Media\'s Type Name') ?></td>
                    <td><?= Module::t('type', 'Actions') ?></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($types as $type): ?>
                    <?php if ($type->isRemoved() == 1): ?>
                        <tr>
                            <td><?= $type->id ?></td>
                            <td><?= $type->name ?></td>
                            <td>
                                <button value="<?= Url::toRoute(['/media/type/view', 'id' => $type->id]); ?>"
                                        data-toggle="tooltip" title="<?= Module::t('type', 'View') ?>" aria-label="View"
                                        class="btn btn-outline-dark btn-rounded btn-xs view-modal-click"><span
                                            class="fa fa-eye"></span></button>
                                <a href="<?= Url::toRoute(['/media/type/update', 'id' => $type->id]); ?>"
                                   data-toggle="tooltip" title="<?= Module::t('type', 'Update') ?>" aria-label="Update"
                                   class="btn btn-outline-dark btn-rounded btn-xs update-modal-click"><span
                                            class="fa fa-pencil"></span></a>
                                <a href="<?= Url::toRoute(['/media/type/remove', 'id' => $type->id]); ?>"
                                   data-toggle="tooltip" title="<?= Module::t('type', 'Delete') ?>"
                                   aria-label="<?= Module::t('type', 'Delete') ?>"
                                   data-confirm="<?= Module::t('type',
                                       'Are you sure you want to delete this item?') ?>"
                                   class="btn btn-outline-dark btn-rounded btn-xs" data-method="post"><span
                                            class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

<?php
Modal::begin([
    'header' => '<h4>' . Module::t('type', 'View Media\'s Type') . '</h4>',
    'id' => 'view-modal',
    'size' => 'modal-md',
]);
echo "<div id='viewModalContent'></div>";
Modal::end();
?>
