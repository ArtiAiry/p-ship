<?php

use app\modules\statistics\Module;
use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = Module::t('source','Leads, Group by Source');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card fade-out">
    <div class="card-body">
        <h1>
            <?= Html::encode($this->title)?>
        </h1>
        <?php if(!empty($leads)): ?>
            <table id="extended-table" class="table table-hover table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                <tr>
                    <td><?= Module::t('source','Source') ?></td>
                    <td><?= Module::t('source','Amount of Leads') ?></td>
                    <td><?= Module::t('source','Unknown') ?></td>
                    <td><?= Module::t('source','Rejected') ?></td>
                    <td><?= Module::t('source','Approved') ?></td>
                    <td><?= Module::t('source','Sold') ?></td>
                    <td><?= Module::t('source','Summary') ?></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach($leads as $lead):?>
                    <!--                --><?php //if($profile->user->getRole() == 'teacher'): ?>
                    <tr>
                        <td><?= $lead->source ?></td>
                        <td><?= $lead->count_lead ?> </td>
                        <td><?= $lead->count_status_unknown ?> </td>
                        <td><?= $lead->count_status_rejected ?> </td>
                        <td><?= $lead->count_status_approved ?> </td>
                        <td><?= $lead->count_status_sold ?> </td>
                        <td><?= $lead->sum_lead_sold_summary ?></td>
                        <!--                            <td>--><?//= $profile->whatsapp ?><!--</td>-->
                        <!--                        <td>--><?//= $profile->user->getRole() ?><!--</td>-->
                    </tr>
                    <!--                --><?php //endif; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
    <?php endif;?>
    </div>
</div>

