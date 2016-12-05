<?php

namespace udamuri\forminput;

use \Yii;
use \yii\helpers\Html;
/*

\udamuri\forminput\FormInput::widget(
    'model' => $model,
    'fieldname' => 'username',
    'type' => '', //checkbox //radio // password // text //
    'label1'=> 'Label Tes',
    'label2'=> 'Label Tes',
    'labeltype' => 'left' , // left, right, middle
);


*/
class FormInput extends \yii\base\Widget
{
	public $input = [] ; 

    public function run()
    {
        return "Hello!";
    }

    protected function input()
    {
       $arrData = $this->input;

	   if(is_array($arrData) && isset($arrData['model']) && isset($arrData['fieldname']) && isset($arrData['type']) )
	   {
            $_input = '';
            $model = $arrData['model'];
            $fieldname = $arrData['fieldname'];
            $label1 =Html::activeLabel($model, 'username');
            if(isset($arrData['label']) && isset($arrData['label2']))
            {

            }


            if($arrData['type'] == 'checkbox')
            {
                
            }
            else if($arrData['type'] == 'radio')
            {
                
            }
            else if($arrData['type'] == 'password' && isset($arrData['labeltype']) )
            {
               
            }
            else if($arrData['type'] == 'text' && isset($arrData['labeltype']) )
            {
                if($arrData['labeltype'] == 'middle')  
                {
                     $_input = '<div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    '.Html::activeTextInput($model, $fieldname).'
                                    <span class="input-group-addon">.00</span>
                                </div>';
                }   
                else if($arrData['labeltype'] == 'right')
                {
                    $_input = '<div class="input-group">
                                  '.Html::activeTextInput($model, $fieldname).'
                                  <span class="input-group-addon" id="basic-addon2">@example.com</span>
                                </div>';
                }
                else
                {
                    $_input = '<div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">@</span>
                                  '.Html::activeTextInput($model, $fieldname).'
                                </div>';
                }
            }

            $_input = '<input type="'.$_inputtype.'"  >';
	   }
	   
       return false;
    }
}
