<?php


use app\modules\profile\models\Profile;
use yii\helpers\Url;

$profile = Profile::findOne(Yii::$app->user->id);
/* @var $model app\models\User */
?>

<?php
digitv\bootstrap\widgets\Modal::begin([
    'header' => '<h4>' . Yii::t('app', 'Contact Us') . '</h4>',
    'id' => 'modal',
    'size' => 'modal-md',
]);
echo "<div id='modalContent' class='card'></div>";
digitv\bootstrap\widgets\Modal::end();
?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image"><img src="/images/faces/manager-bg.png" alt="image"/> <span
                            class="online-status online"></span></div>
                <div class="profile-name">
                    <p class="name">Андрей Максимов</p>
                    <p class="designation">Менеджер</p>
                    <button value="<?= Url::to(['/contact']) ?>" class="badge badge-primary mx-auto mt-3"
                            id="modalButton" data-toggle="tooltip" data-placement="bottom" style="cursor:  pointer;"
                            title="<?= Yii::t('app', 'Ask Manager') ?>"><?= Yii::t('app', 'Ask...') ?></button>
                </div>
            </div>
        </li>
        <?php if ($profile->user->getRole() == 'admin'): ?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false"
                   aria-controls="general-pages"><i class="mdi mdi-poll menu-icon"></i><span
                            class="menu-title"><?= Yii::t('app', 'Statistics') ?></span><i class="menu-arrow"></i></a>
                <div class="collapse" id="general-pages">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link"
                                                href="<?= Url::to(['/statistics/goods']); ?>"><?= Yii::t('app',
                                    'By Products') ?></a></li>
                        <li class="nav-item"><a class="nav-link"
                                                href="<?= Url::to(['/statistics/source']); ?>"><?= Yii::t('app',
                                    'By Sources') ?></a></li>
                        <li class="nav-item"><a class="nav-link"
                                                href="<?= Url::to(['/statistics/date']); ?>"><?= Yii::t('app',
                                    'By Date') ?></a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/leads']); ?>"><i
                            class="mdi mdi-chart-areaspline menu-icon"></i><span class="menu-title"><?= Yii::t('app',
                            'Leads') ?></span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/company']); ?>"><i
                            class="mdi mdi-library-books menu-icon"></i><span class="menu-title"><?= Yii::t('app',
                            'Companies') ?></span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/product']); ?>"><i
                            class="mdi mdi-library-books menu-icon"></i><span class="menu-title"><?= Yii::t('app',
                            'Products') ?></span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/profile']); ?>"><i
                            class="mdi mdi-face-profile menu-icon"></i><span class="menu-title"><?= Yii::t('app',
                            'Profiles') ?></span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/wallet']); ?>"><i
                            class="mdi mdi-wallet menu-icon"></i><span class="menu-title"><?= Yii::t('app',
                            'Wallets') ?></span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/payout']); ?>"><i
                            class="mdi mdi-credit-card menu-icon"></i><span class="menu-title"><?= Yii::t('app',
                            'Payouts') ?></span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/settings']); ?>"><i
                            class="mdi mdi-settings-outline menu-icon"></i><span class="menu-title"><?= Yii::t('app',
                            'Settings') ?></span></a></li>
        <?php elseif ($profile->user->getRole() == 'affiliate'): ?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false"
                   aria-controls="general-pages"><i class="mdi mdi-poll menu-icon"></i><span
                            class="menu-title"><?= Yii::t('app', 'Statistics') ?></span><i class="menu-arrow"></i></a>
                <div class="collapse" id="general-pages">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link"
                                                href="<?= Url::to(['/statistics/goods']); ?>"><?= Yii::t('app',
                                    'By Products') ?></a></li>
                        <li class="nav-item"><a class="nav-link"
                                                href="<?= Url::to(['/statistics/source']); ?>"><?= Yii::t('app',
                                    'By Sources') ?></a></li>
                        <li class="nav-item"><a class="nav-link"
                                                href="<?= Url::to(['/statistics/date']); ?>"><?= Yii::t('app',
                                    'By Date') ?></a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/leads']); ?>"><i
                            class="mdi mdi-chart-areaspline menu-icon"></i><span class="menu-title"><?= Yii::t('app',
                            'Leads') ?></span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/product']); ?>"><i
                            class="mdi mdi-library-books menu-icon"></i><span class="menu-title"><?= Yii::t('app',
                            'Products') ?></span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?= Url::to(['/settings']); ?>"><i
                            class="mdi mdi-settings-outline menu-icon"></i><span class="menu-title"><?= Yii::t('app',
                            'Settings') ?></span></a></li>
        <?php endif; ?>
        <!--        <li class="nav-item"><a class="nav-link" href="pages/ui-features/typography.html"><img class="menu-icon" src="/images/menu_icons/09.png" alt="menu icon"> <span class="menu-title">Typography</span></a></li>-->
        <!--        <li class="nav-item purchase-button"><a class="nav-link" href="https://www.bootstrapdash.com/product/star-admin-pro/" target="_blank">Get full version</a></li>-->
    </ul>
</nav>






