<?php

namespace udamuri\forminput;

use \Yii;
use \yii\helpers\Html;
/*

//text input group
\udamuri\forminput\FormInput::widget([
                    'input'=>[
                            'model' => $model,
                            'fieldname' => 'username',
                            'type' => 'text', // checkbox, text
                            'label1'=> 'Label Tes',
                            'label2'=> 'Label Tes',
                            'labeltype' => 'left' , // left, right, middle
                        ]
                ]);

checkbox button
\udamuri\forminput\FormInput::widget([
                    'input'=>[
                            'model' => $model,
                            'fieldname' => 'rememberMe',
                            'type' => 'checkbox',  // checkbox, text
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

            $InputId = hTML:: getInputId($model, $fieldname);
            $InputName = hTML:: getInputName($model, $fieldname);

            if($arrData['type'] == 'checkbox')
            {
                
                $checked = '';
                if(isset($model->$fieldname) && $model->$fieldname != 0)
                {
                    $checked = 'checked="checked"';
                }

                $_input = '<div class="form-group field-'.$InputId.'"> 
                                <div class="form-yii">
                                    <input name="'.$InputName.'" value="0" type="hidden">
                                    <input id="'.$InputId.'" name="'.$InputName.'" value="1"  '.$checked.' type="checkbox">
                                    <label for="'.$InputId.'">'.$label1.'</label>
                                </div>
                            </div>';
            }
            else if($arrData['type'] == 'text' && isset($arrData['labeltype']) )
            {

                if($arrData['labeltype'] == 'middle')  
                {
                     $_input = '<div class="form-group field-'.$InputId.'">
                                    <span class="input-group-addon">'.$label1.'</span>
                                    '.Html::activeTextInput($model, $fieldname).'
                                    <span class="input-group-addon">'.$label2.'</span>
                                    <p class="help-block"></p>
                                </div>';
                }   
                else if($arrData['labeltype'] == 'right')
                {
                    $_input =  '<div class="form-group field-'.$InputId.'">
                                      '.Html::activeTextInput($model, $fieldname).'
                                      <span class="input-group-addon" id="basic-addon2">'.$label1.'</span>
                                      <p class="help-block"></p>
                                </div>';
                }
                else
                {
                    $_input =  '<div class="form-group field-'.$InputId.'">
                                  <span class="input-group-addon" id="basic-addon1">'.$label1.'</span>
                                  '.Html::activeTextInput($model, $fieldname).'
                                  <p class="help-block"></p>
                                </div>';
                }
            }



            return $_input;

	   }
	   
       return false;
    }
}
