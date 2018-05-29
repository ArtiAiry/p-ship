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
    'header'=>'<h4>'. "Contact Us" .'</h4>',
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
                    <button value="<?= Url::to(['/contact']) ?>" class="badge badge-teal mx-auto mt-3" id="modalButton" data-toggle="tooltip" data-placement="bottom"  title="Ask Manager">Online</button>
                </div>
            </div>
        </li>
        <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/leads']); ?>"><img class="menu-icon" src="/images/menu_icons/05.png" alt="menu icon"><span class="menu-title">Leads</span></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/wallet']); ?>"><img class="menu-icon" src="/images/menu_icons/02.png" alt="menu icon"><span class="menu-title">Wallets</span></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/product']); ?>"><img class="menu-icon" src="/images/menu_icons/03.png" alt="menu icon"><span class="menu-title">Products</span></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/payout']); ?>"><img class="menu-icon" src="/images/menu_icons/04.png" alt="menu icon"><span class="menu-title">Payouts</span></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/source']); ?>"><img class="menu-icon" src="/images/menu_icons/06.png" alt="menu icon"><span class="menu-title">Source</span></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/profile']); ?>"><img class="menu-icon" src="/images/menu_icons/01.png" alt="menu icon"><span class="menu-title">Profiles</span></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/profile/edit','id'=>$profile->id]); ?>"><img class="menu-icon" src="/images/menu_icons/08.png" alt="menu icon"><span class="menu-title">Settings</span></a></li>
<!--        <li class="nav-item"><a class="nav-link" href="pages/charts/chartjs.html"><img class="menu-icon" src="/images/menu_icons/05.png" alt="menu icon"><span class="menu-title">Charts</span></a></li>-->
<!--        <li class="nav-item"><a class="nav-link" href="pages/tables/basic-table.html"><img class="menu-icon" src="/images/menu_icons/06.png" alt="menu icon"><span class="menu-title">Table</span></a></li>-->
<!--        <li class="nav-item"><a class="nav-link" href="pages/icons/font-awesome.html"><img class="menu-icon" src="/images/menu_icons/07.png" alt="menu icon"> <span class="menu-title">Icons</span></a></li>-->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="/images/menu_icons/08.png" alt="menu icon"> <span class="menu-title">General Pages</span><i class="menu-arrow"></i></a>-->
<!--            <div class="collapse" id="general-pages">-->
<!--                <ul class="nav flex-column sub-menu">-->
<!--                    <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html">Blank Page</a></li>-->
<!--                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html">Login</a></li>-->
<!--                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html">Register</a></li>-->
<!--                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html">404</a></li>-->
<!--                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html">500</a></li>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </li>-->
<!--        <li class="nav-item"><a class="nav-link" href="pages/ui-features/typography.html"><img class="menu-icon" src="/images/menu_icons/09.png" alt="menu icon"> <span class="menu-title">Typography</span></a></li>-->
<!--        <li class="nav-item purchase-button"><a class="nav-link" href="https://www.bootstrapdash.com/product/star-admin-pro/" target="_blank">Get full version</a></li>-->
    </ul>
</nav>






