<?php

use app\modules\statistics\Module;
use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = Module::t('date', 'Statistics');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card fade-out">
    <div class="card-body">
        <h3 class="mb-2 ml-3">
            Статистика лидов <p class="sub-naming">(сгруппированные по дате создания)</p>
        </h3>
        </h1>
            <table id="extended-table" class="table table-hover table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                <tr>
                    <td><?= Module::t('date','Date') ?></td>
                    <td><?= Module::t('date','Amount of Leads') ?></td>
                    <td><?= Module::t('date','Processing') ?></td>
                    <td><?= Module::t('date','Rejected') ?></td>
                    <td><?= Module::t('date','Approved') ?></td>
                    <td><?= Module::t('date','Sold') ?></td>
                    <td><?= Module::t('date','Summary') ?></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach($leads as $lead):?>
                    <tr>
                        <td><?= $lead->date ?></td>
                        <td><?= $lead->count_lead ?> </td>
                        <td><?= $lead->count_status_unknown ?> </td>
                        <td><?= $lead->count_status_rejected ?> </td>
                        <td><?= $lead->count_status_approved ?> </td>
                        <td><?= $lead->count_status_sold ?> </td>
                        <td><?= $lead->sum_lead_sold_summary ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
    </div>
</div>

