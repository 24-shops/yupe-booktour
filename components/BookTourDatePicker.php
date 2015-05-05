<?php
/**
* 
*/
Yii::import('bootstrap.widgets.TbDatePicker');

class BookTourDatePicker extends TbDatePicker
{
    public function run() {
        
        list($name, $id) = $this->resolveNameID();
        $id_container = $name.'_data';

        // if ($this->hasModel()) {
        //     if ($this->form) {
        //         echo $this->form->textField($this->model, $this->attribute, $this->htmlOptions);
        //     } else {
        //         echo CHtml::activeTextField($this->model, $this->attribute, $this->htmlOptions);
        //     }

        // } else {
        // }

        echo CHtml::hiddenField($name, $this->value, $this->htmlOptions);
        echo CHtml::openTag('div', ['id'=>$id_container]);
        echo CHtml::closeTag('div');

        $this->registerClientScript();
        $this->registerLanguageScript();
        $options = !empty($this->options) ? CJavaScript::encode($this->options) : '';

        ob_start();
        echo "jQuery('#{$id_container}').datepicker({$options})";
        foreach ($this->events as $event => $handler) {
            echo ".on('{$event}', " . CJavaScript::encode($handler) . ")";
        }

        Yii::app()->getClientScript()->registerScript(__CLASS__ . '#' . $this->getId(), ob_get_clean() . ';');

    }
}
?>