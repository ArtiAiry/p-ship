<?php
/* @var $this \yii\web\View */
/* @var $content string */
/* @var $profile /app/models/Profile */

use app\assets\PublicAsset;
use app\widgets\Alert;
use app\widgets\CustomBreadcrumbs;
use yii\helpers\Html;

PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css" integrity="sha256-AWqwvQ3kg5aA5KcXpX25sYKowsX97sTCTbeo33Yfyk0=" crossorigin="anonymous" />
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>


        <div class="container-scroller">
            <?= $this->render('//parts/navbar')?>

            <div class="container-fluid page-body-wrapper">

                <?= $this->render('//parts/sidebar')?>
            <div class="main-panel">
                <div class="content-wrapper">
                <?= CustomBreadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
                </div>
                <?= $this->render('//parts/footer')?>
            </div>

        </div>

    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>