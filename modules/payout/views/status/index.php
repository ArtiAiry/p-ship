<?php

use app\modules\payout\Module;
use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('status', 'Statuses');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
Modal::begin([
    'header' => '<h4>' . Module::t('status', 'Adding a Status') . '</h4>',
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
                    data-toggle="tooltip" data-placement="bottom" title="<?= Module::t('status', 'Add Status') ?>">
                <?= Module::t('status', 'Create') ?>
            </button>
        </h1>

        <?php if (!empty($statuses)): ?>
            <table id="min-table" class="table table-hover table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                <tr>
                    <td><?= Module::t('status', 'ID') ?></td>
                    <td><?= Module::t('status', 'Status Name') ?></td>
                    <td><?= Module::t('status', 'Actions') ?></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($statuses as $status): ?>
                    <tr>
                        <td><?= $status->id ?></td>
                        <td><?= $status->name ?></td>
                        <td>
                            <button value="<?= Url::toRoute(['/payout/status/view', 'id' => $status->id]); ?>"
                                    data-toggle="tooltip" title="<?= Module::t('status', 'View') ?>" aria-label="View"
                                    class="btn btn-outline-dark btn-rounded btn-xs view-modal-click"><span
                                        class="fa fa-eye"></span></button>
                            <a href="<?= Url::toRoute(['/payout/status/update', 'id' => $status->id]); ?>"
                               data-toggle="tooltip" title="<?= Module::t('status', 'Update') ?>" aria-label="Update"
                               class="btn btn-outline-dark btn-rounded btn-xs update-modal-click"><span
                                        class="fa fa-pencil"></span></a>
                            <a href="<?= Url::toRoute(['/payout/status/remove', 'id' => $status->id]); ?>"
                               data-toggle="tooltip" title="Delete"
                               aria-label="<?= Module::t('status', 'Delete') ?>"
                               data-confirm="Are you sure you want to delete this item?"
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

<?php
Modal::begin([
    'header' => '<h4>' . Module::t('status', 'View Status') . '</h4>',
    'id' => 'view-modal',
    'size' => 'modal-md',
]);
echo "<div id='viewModalContent'></div>";
Modal::end();
?>

