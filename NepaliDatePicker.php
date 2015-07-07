<?php
/**
 * @copyright Copyright (c) 2013-2015 tejrajs
 * @link http://tejrajstha.com.np
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace vendor\bentray\Nepalidatepicker;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;
/**
 * Nepali DatePicker renders a DatePicker input.
 *
 * @author Shamit Shrestha
 * @package bentray\Nepalidatepicker
 */
class NepaliDatePicker extends InputWidget
{
    /**
     * @var string the language to use
     */
    public $language;

    /**
     * @var bool whether to render the input as an inline calendar
     */
    public $inline = true;
    /**
     * @var bool whether the field is readonly or not
     */
    public $readonly=true;
    /**
     * @var varchar set the value of field
     */
    public $value='';
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if($this->readonly)
            $this->options['readonly'] = 'readonly';
        if($this->value)
            $this->options['value']=$this->value;
        if ($this->inline) {
            Html::addCssClass($this->options, 'nepali-calendar');
        }


    }
    /**
     * @inheritdoc
     */
    public function run()
    {

        $input = $this->hasModel()
            ? Html::activeTextInput($this->model, $this->attribute, $this->options)
            : Html::textInput($this->name, $this->value, $this->options);
        echo $input;
        $this->registerClientScript();
    }
    /**
     * Registers required script for the plugin to work as DatePicker
     */
    public function registerClientScript()
    {
        $js = [];
        $view = $this->getView();
        // @codeCoverageIgnoreStart
        NepaliDatePickerAsset::register($view);
        // @codeCoverageIgnoreEnd

        $js[]="$(document).ready(function(){
        $('.nepali-calendar').nepaliDatePicker();
        });";
        $view->registerJs(implode("\n", $js));
    }
}