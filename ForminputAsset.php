<?php

namespace udamuri\forminput;

use \Yii;

class ForminputAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/udamuri/yii2-forminput/assets';

    public $js = [
  
    ];
    
    public $css = [
        'cobutton.css'
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    
    public function init()
    {
        parent::init();
       // $this->js[] = 'i18n/' . Yii::$app->language . '.js'; // dynamic file added
    }
}