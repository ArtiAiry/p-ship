<?php
use digitv\bootstrap\widgets\Modal;
use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Profiles';
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="card fade-out">


        <div class="card-body">
            <h1><?= Html::encode($this->title)?></h1>
            <?php if(!empty($profiles)): ?>
            <div class="table-responsive">
                <table id="example" class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Affliante Name</td>
                        <td>Email</td>
                        <td>Telegram</td>
                        <td>Status</td>
                        <td>Whatsapp</td>
                        <!--                <td>Role</td>-->
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($profiles as $profile):?>
                        <!--                --><?php //if($profile->user->getRole() == 'teacher'): ?>
                        <tr>
                            <td><?= $profile->id ?></td>
                            <td><?= $profile->first_name . " " . $profile->last_name ?></td>
                            <td><?= $profile->user->email ?></td>
                            <td><label class="badge badge-primary"><?= $profile->telegram ?></label></td>
                            <td><?= $profile->user->getStatusName() ?></td>
                            <td><?= $profile->whatsapp ?></td>
                            <!--                        <td>--><?//= $profile->user->getRole() ?><!--</td>-->
                            <td>
                                <button value="<?= Url::toRoute(['/profile/view','id'=>$profile->id]);?>" data-toggle="tooltip" title="View" aria-label="View" class="btn btn-outline-dark btn-rounded btn-xs view-modal-click"><span class="fa fa-eye"></span></button>
                                <a href="<?= Url::toRoute(['/profile/update','id'=>$profile->id]);?>" data-toggle="tooltip"  title="Update" aria-label="Update" class="btn btn-outline-dark btn-rounded btn-xs update-modal-click"><span class="fa fa-pencil" ></span></a>
                                <a href="<?= Url::toRoute(['/profile/delete','id'=>$profile->id]);?>" data-toggle="tooltip"  title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" class="btn btn-outline-dark btn-rounded btn-xs" data-method="post"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        <!--                --><?php //endif; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif;?>


</div>

<?php
Modal::begin([
    'header' => '<h4>'. "View Wallet" .'</h4>',
    'id' => 'view-modal',
    'size' => 'modal-md',
]);
echo "<div id='viewModalContent'></div>";
Modal::end();
?>