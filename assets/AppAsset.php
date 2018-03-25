<?php

namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
		'css/bootstrap.css',
        'css/AdminLTE.css',
        'css/skins/_all-skins.min.css',
        'fonts/font-awesome/css/font-awesome.min.css',
        'ionicons/css/ionicons.min.css',
        'css/button.css',
        'css/style.css'
    ];
    public $js = [
       
    ];
    public $depends = [
        //'yii\web\YiiAsset',
       // 'yii\bootstrap\BootstrapAsset',
    ];
}
