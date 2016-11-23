<?php
namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

class AngularAsset extends AssetBundle
{
    public $sourcePath = '@bower';
    public $js = [
        'require/require.js',
//         'angular/angular.js',
//         'angular-async-loader/angular-async-loader.js',
//         'angular-route/angular-route.js',
//         'angular-strap/dist/angular-strap.js',
    ];
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
}