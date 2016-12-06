<?php

namespace udamuri\forminput;

use \Yii;
use \yii\helpers\Html;
/*

\udamuri\forminput\FormInput::widget(
    'model' => $model,
    'fieldname' => 'username',
    'type' => '', //checkbox // password // text //
    'label1'=> 'Label Tes',
    'label2'=> 'Label Tes',
    'labeltype' => 'left' , // left, right, middle
);

\udamuri\forminput\FormInput::widget([
                    'input'=>[
                            'model' => $model,
                            'fieldname' => 'rememberMe',
                            'type' => 'checkbox', 
                        ]
                ]);

*/
class FormInput extends \yii\base\Widget
{
	public $input = [] ; 

    public function run()
    {
        ForminputAsset::register($this->getView());
        return $this->crinput();
    }

    protected function crinput()
    {
       $arrData = $this->input;

	   if(is_array($arrData) && isset($arrData['model']) && isset($arrData['fieldname']) && isset($arrData['type']) )
	   {
            $_input = '';
            $model = $arrData['model'];
            $fieldname = $arrData['fieldname'];
            $label1 = strip_tags(Html::activeLabel($model, $fieldname));
            $label2 = '';
            if(isset($arrData['label1']) && isset($arrData['label2']))
            {
                 $label1 = $arrData['label1'];
                 $label2 = $arrData['label2'];
            }

            if($arrData['type'] == 'checkbox')
            {
                $InputId = hTML:: getInputId($model, $fieldname);
                $InputName = hTML:: getInputName($model, $fieldname);

                $checked = '';
                if(isset($model->$fieldname) && $model->$fieldname != 0)
                {
                    $checked = 'checked="checked"';
                }
                
                $_input = '<div class="input-group"> <div class="form-yii">
                    <input name="'.$InputName.'" value="0" type="hidden">
                    <input id="'.$InputId.'" name="'.$InputName.'" value="1"  '.$checked.' type="checkbox">
                    <label for="'.$InputId.'">'.$label1.'</label>
                </div></div>';
            }
            else if($arrData['type'] == 'radio')
            {
                    
            }
            else if($arrData['type'] == 'password' && isset($arrData['labeltype']) )
            {   
                if($arrData['labeltype'] == 'middle')  
                {
                     $_input = '<div class="input-group">
                                    <span class="input-group-addon">'.$label1.'</span>
                                    '.Html::activePasswordInput($model, $fieldname).'
                                    <span class="input-group-addon">'.$label2.'</span>
                                </div>';
                }   
                else if($arrData['labeltype'] == 'right')
                {
                    $_input = '<div class="input-group">
                                  '.Html::activePasswordInput($model, $fieldname).'
                                  <span class="input-group-addon" id="basic-addon2">'.$label1.'</span>
                                </div>';
                }
                else
                {
                    $_input = '<div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">'.$label1.'</span>
                                  '.Html::activePasswordInput($model, $fieldname).'
                                </div>';
                }
            }
            else if($arrData['type'] == 'text' && isset($arrData['labeltype']) )
            {
                if($arrData['labeltype'] == 'middle')  
                {
                     $_input = '<div class="input-group">
                                    <span class="input-group-addon">'.$label1.'</span>
                                    '.Html::activeTextInput($model, $fieldname).'
                                    <span class="input-group-addon">'.$label2.'</span>
                                </div>';
                }   
                else if($arrData['labeltype'] == 'right')
                {
                    $_input = '<div class="input-group">
                                  '.Html::activeTextInput($model, $fieldname).'
                                  <span class="input-group-addon" id="basic-addon2">'.$label1.'</span>
                                </div>';
                }
                else
                {
                    $_input = '<div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">'.$label1.'</span>
                                  '.Html::activeTextInput($model, $fieldname).'
                                </div>';
                }
            }

            return $_input;

	   }
	   
       return false;
    }
}
