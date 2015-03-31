<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        
//        'coloradmin/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css',
        'coloradmin/plugins/font-awesome/css/font-awesome.min.css',
        'coloradmin/css/animate.min.css',
        'coloradmin/css/style.min.css',
        'coloradmin/css/style-responsive.min.css',
        'coloradmin/css/theme/default.css',
        'css/site.css',
//        'coloradmin/',
//        'coloradmin/',
//        'coloradmin/',
//        'coloradmin/',
        
    ];
    public $js = [
//        'coloradmin/plugins/pace/pace.min.js',
//        'coloradmin/js/dashboard.min.js',
        'coloradmin/plugins/slimscroll/jquery.slimscroll.min.js',
        'coloradmin/js/apps.js',

        'js/main.js',
//        'coloradmin/js/plugins/jquery-ui/ui/minified/jquery-ui.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
