<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class BackAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/backend/app.min.css',
        'css/backend/dataTables.bootstrap4.min.css',
        'css/backend/bootstrap.min.css',
        'css/backend/dataTables.bootstrap4.min.css',
        'css/backend/icons.min.css',
        'css/backend/responsive.bootstrap4.min.css'

    ];
    public $js = [
        'js/backend/apexcharts.min.js',
        'js/backend/jquery-jvectormap-1.2.2.min.js',
        'js/backend/jquery-jvectormap-us-merc-en.js',
        'js/backend/jquery.dataTables.min.js',
        'js/backend/dataTables.bootstrap4.min.js',
        'js/backend/dataTables.responsive.min.js',
        'js/backend/responsive.bootstrap4.min.js',
        'js/backend/dashboard.init.js',
        'js/backend/app.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
