<?php
/**
* 
*/
Yii::import('zii.widgets.jui.CJuiDatePicker');

class BookTourDatePicker extends CJuiDatePicker
{
    public $language = 'ru';

    public $cssClassOpenDate = 'active';

    public $cssClassClosedDate = 'closed';
    
    public $flat = true;

    public function run()
    {
        list($name,$id)=$this->resolveNameID();

        if(isset($this->htmlOptions['id']))
            $id = $this->htmlOptions['id'];
        else
            $this->htmlOptions['id'] = $id;
        if(isset($this->htmlOptions['name']))
            $name=$this->htmlOptions['name'];

        if($this->flat === false)
        {
            if($this->hasModel())
                echo CHtml::activeTextField($this->model, $this->attribute, $this->htmlOptions);
            else
                echo CHtml::textField($name, $this->value, $this->htmlOptions);
        }
        else
        {
            if($this->hasModel())
            {
                echo CHtml::activeHiddenField($this->model,$this->attribute,$this->htmlOptions);
                $attribute=$this->attribute;
                $this->options['defaultDate']=$this->model->$attribute;
            }
            else
            {
                echo CHtml::hiddenField($name,$this->value,$this->htmlOptions);
                $this->options['defaultDate']=$this->value;
            }

            $this->options['altField']='#'.$id;

            $id=$this->htmlOptions['id']=$id.'_container';
            $this->htmlOptions['name']=$name.'_container';

            echo CHtml::tag('div',$this->htmlOptions,'');
        }

        // ------------------
        $module  = Yii::app()->getModule('booktour');
        $this->options['numberOfMonths'] = explode(',', $module->numberOfMonths);
        $dates = CJSON::encode($this->model->getJsonDates());
        $js = '
            var dates = '.$dates.';
            function makeCalDate(date)
            {
                var d = date.getDate().toString();
                var m = 1 + date.getMonth();
                var y = date.getFullYear().toString();
                if(d.length < 2){
                    d = "0" + d;
                }
                m = m.toString();
                if(m.length < 2){
                    m = "0" + m;
                }
                var Date2 = d +"."+ m +"."+ y;
                return Date2;
            };

            /* Преобразует дату в unixtime */
            function time(date){

                if (date)
                {
                    date = date.replace(\' \', \'T\');
                    date = new Date(date);
                }
                else
                    date = new Date();
                
                return parseInt(date.getTime()/1000)
            };

            /* Проверка просроченой даты. true дата попала в интервал, false не попала в интервал*/
            function isOverdue(elem){

                // console.log(time());
                // console.log(elem);

                if (time() > time(elem.opening_booking) && time() < time(elem.closing_booking))
                    return true;
                else
                    return false;
            };
        ';

        $this->options["beforeShowDay"] = "js:
        function(date){
            var date = makeCalDate(date);
            var elem = dates[date];
            if (typeof elem == 'undefined') {
                return[false, ''];
            }else{
                if (isOverdue(elem)) {
                    return [
                        true,
                        '".$this->cssClassOpenDate."',
                        'Максимальное количество человек ' + elem.maximum_quantity
                    ];
                }else{
                    return[false, '".$this->cssClassClosedDate."', 'Бронирование доступно c ' + elem.opening_booking + ' до ' + elem.closing_booking];
                }
            }
        }";
        // ------------------

        $options=CJavaScript::encode($this->options);


        // $js .= "\n jQuery('#{$id}').datepicker($options);";

        // if($this->language!='' && $this->language!='en')
        // {
        $this->registerScriptFile($this->i18nScriptFile);
        $js .= "\n jQuery('#{$id}').datepicker(jQuery.extend({showMonthAfterYear:false},jQuery.datepicker.regional['{$this->language}'],{$options}));";
        // }

        $cs = Yii::app()->getClientScript();

        if(isset($this->defaultOptions))
        {
            $this->registerScriptFile($this->i18nScriptFile);
            $cs->registerScript(__CLASS__,$this->defaultOptions!==null?'jQuery.datepicker.setDefaults('.CJavaScript::encode($this->defaultOptions).');':'');
        }
        $cs->registerScript(__CLASS__.'#'.$id,$js);
    }
}
?>