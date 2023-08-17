<?php


namespace app\assets;

/**
 * Class JQAsset
 * @package app\assets
 */
class JQAsset extends \yii\web\JqueryAsset
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $jsOptions =
        ['position' => \yii\web\View::POS_HEAD];

    public $js = [
        '/js/jquery.js',
    ];

}