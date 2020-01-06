<?php

use app\modules\company\Module;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\company\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('company','Companies');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Module::t('company','Create Company'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <table id="min-table" class="table table-hover table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Info</td>
            <td>Created At</td>
            <td>Updated At</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
