<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // '/css/site.css',
        '/assets1/css/bootstrap.css',
        '/assets1/css/bootstrap-responsive.css',
        '/assets1/css/docs.css',
        '/assets1/css/prettyPhoto.css',
        '/assets1/js/google-code-prettify/prettify.css',
        '/assets1/css/flexslider.css',
        '/assets1/css/sequence.css',
        '/assets1/css/style.css',
        '/assets1/color/default.css',
  
    ];
    public $js = [
        '/assets1/js/jquery.min.js',
        '/assets1/js/jquery.easing.js',
        '/assets1/js/google-code-prettify/prettify.js',
        '/assets1/js/modernizr.js',
        '/assets1/js/bootstrap.js',
        '/assets1/js/jquery.elastislide.js',
        '/assets1/js/sequence/sequence.jquery-min.js',
        '/assets1/js/sequence/setting.js',
        '/assets1/js/jquery.prettyPhoto.js',
        '/assets1/js/application.js',
        '/assets1/js/jquery.flexslider.js',
        '/assets1/js/hover/jquery-hover-effect.js',
        '/assets1/js/hover/setting.js',
        '/assets1/js/custom.js',
    ];
    public $depends = [
        // 'rmrevin/yii/fontawesome/CdnFreeAssetBundle'
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
