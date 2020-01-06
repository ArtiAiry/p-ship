<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class PublicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        'css/materialdesignicons.min.css',
        'css/simple-line-icons.css',

        'css/datatables.css',
        'css/buttons.bootstrap4.min.css',

        'css/owl.carousel.css',
        'css/owl.theme.default.css',
        '//vjs.zencdn.net/7.3.0/video-js.min.css',
        'css/style.css',

        'css/custom.css',

        'https://app.dineandgift.com/plugins/daterangepicker/daterangepicker.css',

        //cdn video.js
        '//vjs.zencdn.net/5.4.6/video-js.min.css'

    ];
    public $js = [

        //cdn

        'http://code.jquery.com/ui/1.11.0/jquery-ui.js',
        'https://cdn.jsdelivr.net/momentjs/latest/moment.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.27/daterangepicker.js',

        'js/chart.js',
        'js/maps.js',
        'js/misc.js',
        'js/off-canvas.js',
        'js/popper.js',
        'js/popper.min.js',
        'js/bootstrap.min.js',
        'js/datatables.js',
        'js/buttons.bootstrap4.min.js',

        //datatables + daterange
        'https://cdn.datatables.net/plug-ins/1.10.20/sorting/datetime-moment.js',
//        'https://cdn.datatables.net/plug-ins/1.10.20/sorting/date-eu.js',

        'js/dates/daterangeLeads.js',
        'js/dates/daterangeDates.js',

        'js/owl.carousel.js',
        'js/clipboard.js',
        'js/dashboard.js',
        'js/custom.js',
        'js/modal/modal.js',
        'js/modal/modal1.js',
        'js/modal/modal2.js',

        'js/modal/modalView.js',
        'js/modal/modalUpdate.js',
        'js/modal/modalMedia.js',

        //cdn video.js
        '//vjs.zencdn.net/5.4.6/video.min.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
