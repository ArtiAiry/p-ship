<?php
use app\models\User;
use app\modules\profile\models\Profile;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$profile = Profile::findOne(Yii::$app->user->id);
/* @var $model app\models\User */
?>

<?php
digitv\bootstrap\widgets\Modal::begin([
    'header'=>'<h4>'. Yii::t('app','Contact Us') .'</h4>',
    'id'=>'modal',
    'size'=>'modal-md',
]);
echo "<div id='modalContent' class='card'></div>";
digitv\bootstrap\widgets\Modal::end();
?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image"> <img src="/images/faces/face4.jpg" alt="image"/> <span class="online-status online"></span> </div>
                <div class="profile-name">
                    <p class="name"><?=Yii::$app->user->identity->username ?></p>
                    <p class="designation">Manager</p>
                    <button value="<?= Url::to(['/contact']) ?>" class="badge badge-teal mx-auto mt-3" id="modalButton" data-toggle="tooltip" data-placement="bottom"  title="<?= Yii::t('app','Ask Manager') ?>">Online</button>
                </div>
            </div>
        </li>
        <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/leads']); ?>"><img class="menu-icon" src="/images/menu_icons/05.png" alt="menu icon"><span class="menu-title"><?= Yii::t('app','Leads') ?></span></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/wallet']); ?>"><img class="menu-icon" src="/images/menu_icons/02.png" alt="menu icon"><span class="menu-title"><?= Yii::t('app','Wallets') ?></span></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/product']); ?>"><img class="menu-icon" src="/images/menu_icons/03.png" alt="menu icon"><span class="menu-title"><?= Yii::t('app','Products') ?></span></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/payout']); ?>"><img class="menu-icon" src="/images/menu_icons/04.png" alt="menu icon"><span class="menu-title"><?= Yii::t('app','Payouts') ?></span></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/profile']); ?>"><img class="menu-icon" src="/images/menu_icons/01.png" alt="menu icon"><span class="menu-title"><?= Yii::t('app','Profiles') ?></span></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/profile/edit','id'=>$profile->id]); ?>"><img class="menu-icon" src="/images/menu_icons/08.png" alt="menu icon"><span class="menu-title"><?= Yii::t('app','Settings') ?></span></a></li>
<!--        <li class="nav-item"><a class="nav-link" href="pages/charts/chartjs.html"><img class="menu-icon" src="/images/menu_icons/05.png" alt="menu icon"><span class="menu-title">Charts</span></a></li>-->
<!--        <li class="nav-item"><a class="nav-link" href="pages/tables/basic-table.html"><img class="menu-icon" src="/images/menu_icons/06.png" alt="menu icon"><span class="menu-title">Table</span></a></li>-->
<!--        <li class="nav-item"><a class="nav-link" href="pages/icons/font-awesome.html"><img class="menu-icon" src="/images/menu_icons/07.png" alt="menu icon"> <span class="menu-title">Icons</span></a></li>-->
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="/images/menu_icons/08.png" alt="menu icon"> <span class="menu-title"><?= Yii::t('app','Statistics') ?></span><i class="menu-arrow"></i></a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= Url::to(['/statistics/products']); ?>"><?= Yii::t('app','By Products') ?></a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= Url::to(['/statistics/source']); ?>"><?= Yii::t('app','By Sources') ?></a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= Url::to(['/statistics/date']); ?>"><?= Yii::t('app','By Date') ?></a></li>
                </ul>
            </div>
        </li>
<!--        <li class="nav-item"><a class="nav-link" href="pages/ui-features/typography.html"><img class="menu-icon" src="/images/menu_icons/09.png" alt="menu icon"> <span class="menu-title">Typography</span></a></li>-->
<!--        <li class="nav-item purchase-button"><a class="nav-link" href="https://www.bootstrapdash.com/product/star-admin-pro/" target="_blank">Get full version</a></li>-->
    </ul>
</nav>






