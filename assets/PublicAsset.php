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
        'css/style.css',
        'css/custom.css',
    ];
    public $js = [
//        'js/jquery-3.3.1.js',

        'js/chart.js',

        'js/maps.js',
        'js/misc.js',
        'js/off-canvas.js',
        'js/popper.js',
        'js/popper.min.js',
        'js/bootstrap.min.js',

        'js/dashboard.js',
        'js/custom.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
