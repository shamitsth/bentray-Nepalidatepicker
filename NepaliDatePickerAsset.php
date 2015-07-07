<?php
/**
 * Created by PhpStorm.
 * User: Shamit Shrestha
 * Date: 7/5/2015
 * Time: 9:12 PM
 */
namespace vendor\bentray\Nepalidatepicker;
use yii\web\AssetBundle;


class NepaliDatePickerAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bentray/Nepalidatepicker';

    public $autoGenerate = true;
    /**
     * @inheritdoc
     */
    public $js = ['nepali.datepicker.js'];
    public $css = [	'nepali.datepicker.css'	];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}