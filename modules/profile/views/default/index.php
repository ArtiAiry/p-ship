<?php

use app\modules\profile\Module;
use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Module::t('profile', 'Profiles');
$this->params['breadcrumbs'][] = $this->title;

?>


    <div class="card fade-out">
        <div class="card-body">
            <h1><?= Html::encode($this->title) ?></h1>
            <?php if (!empty($profiles)): ?>
                <table id="min-table" class="table table-hover table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <td><?= Module::t('profile', 'ID') ?></td>
                        <td><?= Module::t('profile', 'Username') ?></td>
                        <td><?= Module::t('profile', 'Affliante\'s name') ?></td>
                        <td><?= Module::t('profile', 'Email') ?></td>
                        <td><?= Module::t('profile', 'Telegram') ?></td>
                        <td><?= Module::t('profile', 'Status') ?></td>
                        <td><?= Module::t('profile', 'Whatsapp') ?></td>
                        <td><?= Module::t('profile', 'Role') ?></td>
                        <td><?= Module::t('profile', 'Actions') ?></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($profiles as $profile): ?>
                        <tr>
                            <td><?= $profile->id ?></td>
                            <td><?= $profile->user->username ?></td>
                            <td><?= $profile->first_name . " " . $profile->last_name ?></td>
                            <td><?= $profile->user->email ?></td>
                            <td><label class="badge badge-primary"><?= $profile->telegram ?></label></td>
                            <td><?= $profile->user->getStatusName() ?></td>
                            <td><?= $profile->whatsapp ?></td>
                            <td><?= $profile->user->getRoleName() ?></td>
                            <td>
                                <button value="<?= Url::toRoute(['/profile/view', 'id' => $profile->id]); ?>"
                                        data-toggle="tooltip" title="<?= Module::t('profile', 'View') ?>"
                                        aria-label="View"
                                        class="btn btn-outline-dark btn-rounded btn-xs view-modal-click"><span
                                            class="fa fa-eye"></span></button>
                                <a href="<?= Url::toRoute(['/profile/edit', 'id' => $profile->id]); ?>"
                                   data-toggle="tooltip" title="<?= Module::t('profile', 'Update') ?>"
                                   aria-label="Update"
                                   class="btn btn-outline-dark btn-rounded btn-xs update-modal-click"><span
                                            class="fa fa-pencil"></span></a>
                                <a href="<?= Url::toRoute(['/profile/delete', 'id' => $profile->id]); ?>"
                                   data-toggle="tooltip" title="<?= Module::t('profile', 'Delete') ?>"
                                   aria-label="Delete" data-confirm="<?= Module::t('profile',
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

<?php
Modal::begin([
    'header' => '<h4>' . Module::t('profile', 'Viewing a Profile') . '</h4>',
    'id' => 'view-modal',
    'size' => 'modal-md',
]);
echo "<div id='viewModalContent'></div>";
Modal::end();
?>