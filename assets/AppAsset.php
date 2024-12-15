<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css\bootstrap.min.css',
        'css\css2.css',
        'css\icofont.css',
        'css\style.css',
        'css\swiper.min.css',
        'css\site.css',
        'css\bootstrap-icons.min.css',
        'css\bcolor-saladGreen.css',
        'css\color-switcher.css',
        'css\memberstyle.css',
        'css\owl.carousel.min',
        'css\owl.theme.default.min.css',
        'css\responsive.css',
        'css\custom.css',
        'css\all.min.css'
    ];
    public $js = [
        'js\bootstrap.min.js',
        'js\custom.js',
        'js\isotope.pkgd.min.js',
        'js\jquery-main.js',
        'js\jquery-migrate.js',
        'js\jquery.countdown.min.js',
        'js\modernizr.js',
        'js\popper.min.js',
        'js\swiper.min.js',
        'js\ajax-form.js',
        'js\bootstrap.bundle.min.js',
        'js\isotope.pkgd.min.js',
        'js\jquery.min.js',
        'js\owl.carousel.min.js',
        'js\script.js',
        'js\switcher.min.js',
        'js\typed.mim.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
