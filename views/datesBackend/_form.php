<?php
/**
 * Отображение для _form:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 *
 *   @var $model Dates
 *   @var $form TbActiveForm
 *   @var $this DatesBackendController
 **/
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', array(
        'id'                     => 'dates-form',
        'enableAjaxValidation'   => false,
        'enableClientValidation' => true,
        'type'=>'horizontal',
        'htmlOptions'            => array('class' => 'well'),
    )
);
?>

<div class="alert alert-info">
    <?php echo Yii::t('booktour', 'Поля, отмеченные'); ?>
    <span class="required">*</span>
    <?php echo Yii::t('booktour', 'обязательны.'); ?>
</div>

<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-sm-12">
            <?php echo $form->dateTimePickerGroup($model,'date_reservation',array(
                'widgetOptions'=>array(
                    'options'=>array(
                        'format'=>$model->dateFormat,
                    ),
                    'htmlOptions'=>array()
                ),
                'prepend'=>'<i class="fa fa-calendar"></i>'
            )); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?php echo $form->dateTimePickerGroup($model,'opening_booking',array(
                'widgetOptions'=>array(
                    'options'=>array(
                        'format'=>$model->dateFormat,
                    ),
                    'htmlOptions'=>array()
                ),
                'prepend'=>'<i class="fa fa-calendar"></i>'
            )); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?php echo $form->dateTimePickerGroup($model,'closing_booking',array(
                'widgetOptions'=>array(
                    'options'=>array(
                        'format'=>$model->dateFormat,
                    ),
                    'htmlOptions'=>array()
                ),
                'prepend'=>'<i class="fa fa-calendar"></i>'
            )); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?php echo $form->textFieldGroup($model, 'maximum_quantity', array('widgetOptions' => array('htmlOptions' => array('class' => 'popover-help', 'data-original-title' => $model->getAttributeLabel('maximum_quantity'), 'data-content' => $model->getAttributeDescription('maximum_quantity'))))); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?php echo $form->switchGroup($model, 'status',array('widgetOptions' => array('htmlOptions' => array('class' => 'popover-help', 'data-original-title' => $model->getAttributeLabel('status'), 'data-content' => $model->getAttributeDescription('status'))))); ?>
            <?php //echo $form->textFieldGroup($model, 'status', array('widgetOptions' => array('htmlOptions' => array('class' => 'popover-help', 'data-original-title' => $model->getAttributeLabel('status'), 'data-content' => $model->getAttributeDescription('status'))))); ?>
        </div>
    </div>

    <?php
    $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'context'    => 'primary',
            'label'      => Yii::t('booktour', 'Сохранить Дату и продолжить'),
        ]
    ); ?>
    <?php
    $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'htmlOptions'=> ['name' => 'submit-type', 'value' => 'index'],
            'label'      => Yii::t('booktour', 'Сохранить Дату и закрыть'),
        ]
    ); ?>

<?php $this->endWidget(); ?>