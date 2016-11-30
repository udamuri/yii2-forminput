<?php

namespace udamuri\forminput;

use \Yii;
use \yii\helpers\Html;

class FormInput extends \yii\base\Widget
{
	public $model = false; 
	public $input = [] ; 
    public function run()
    {
        return "Hello!";
    }

    protected function input()
    {
    	if($this->model)
    	{
    		if(is_array($this->input))
    		{

    		}
    		else
    		{

    		}
    	}
    }
}
