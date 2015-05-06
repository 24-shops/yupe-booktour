<?php $this->pageTitle = Yii::app()->getModule('booktour')->title; ?>
<h1><?php echo $this->pageTitle; ?></h1>
<?php
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', array(
        'id'                     => 'dates-form',
        'enableAjaxValidation'   => false,
        'enableClientValidation' => true,
        // 'htmlOptions'            => array('class' => 'well'),
    )
);
?>
    <div class="row">
        <div class="col-sm-6">
            <?php echo $form->textFieldGroup($model,'surname'); ?>
        </div>
        <div class="col-sm-6">
            <?php echo $form->textFieldGroup($model,'name'); ?>
        </div>
        <div class="col-sm-6">
            <?php echo $form->textFieldGroup($model,'patronymic'); ?>
        </div>
        <div class="col-sm-6">
            <?php echo $form->textFieldGroup($model,'mail'); ?>
        </div>
        <div class="col-sm-6">
            <?php echo $form->textFieldGroup($model,'phone'); ?>
        </div>
        <div class="col-sm-6">
            <?php echo $form->dateTimePickerGroup($model,'date_of_birth',array(
                'widgetOptions'=>array(
                    'options'=>array(),
                    'htmlOptions'=>array()
                ),
                'prepend'=>'<i class="fa fa-calendar"></i>'
                )); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?php
                $this->widget('application.modules.booktour.components.BookTourDatePicker',array(
                    'name'=>'date_reservation',
                    'model'=>$model,
                    'options'=>array(
                        'numberOfMonths'  => [1,2],
                    ),
                ));
            ?>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
        <?php
        $this->widget(
            'bootstrap.widgets.TbButton', [
                'buttonType' => 'submit',
                'context'    => 'primary',
                'label'      => Yii::t('booktour', 'Записаться'),
            ]
        ); ?>
        </div>
    </div>
<?php $this->endWidget(); ?>