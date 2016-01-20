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

Yii::app()->clientScript->registerPackage('timepicker');

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
            <?php echo $form->datePickerGroup($model,'date_reservation',array(
                'widgetOptions'=>array(
                    'options'=>array(
                        'format'=>$model->dateFormat,
                    ),
                    'htmlOptions'=>array()
                ),
                'prepend'=>'<i class="fa fa-calendar"></i>'
            )); ?>
            <a href="#" id="add-product-variant">Добавить</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12">
            <div class="variant-template variant form-inline">
                <table>
                    <thead>
                        <tr>
                            <td><?= 'Время' ?></td>
                            <td><?= 'Максимальное количество человек' ?></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody id="time-variants">
                        <?php foreach ((array)$model->times as $time): ?>
                            <?php $this->renderPartial('_time_row', ['time' => $time]); ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    <div class="row">
        <div class="col-sm-12">
            <?php echo $form->datePickerGroup($model,'opening_booking',array(
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
            <?php echo $form->datePickerGroup($model,'closing_booking',array(
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
<!--     <div class="row">
    <div class="col-sm-12">
        <?php //echo $form->textFieldGroup($model, 'maximum_quantity', array('widgetOptions' => array('htmlOptions' => array('class' => 'popover-help', 'data-original-title' => $model->getAttributeLabel('maximum_quantity'), 'data-content' => $model->getAttributeDescription('maximum_quantity'))))); ?>
    </div>
</div> -->
    <div class="row">
        <div class="col-sm-12">
            <?php echo $form->switchGroup(
                $model, 
                'status',
                array(
                    'widgetOptions' => array(
                        'options' => array(
/*                            'onText' => 'Жопень',
                            'offText' => 'Ебала',*/
                        ),
                        'htmlOptions' => array(
                            'class' => 'popover-help', 
                            'data-original-title' => $model->getAttributeLabel('status'),
                            'data-content' => $model->getAttributeDescription('status')
                        )
                    )
                )
            ); ?>
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


<script type="text/javascript">
    $(function () {
        $('#product-form').submit(function () {
            var productForm = $(this);
            $('#category-tree a.jstree-clicked').each(function (index, element) {
                productForm.append('<input type="hidden" name="categories[]" value="' + $(element).data('category-id') + '" />');
            });
        });

        var typeAttributes = {};

        function updateVariantTypeAttributes() {
            var typeId = $('#product-type').val();
            if (typeId) {
                $.getJSON('<?= Yii::app()->createUrl('/store/productBackend/typeAttributes');?>/' + typeId, function (data) {
                    typeAttributes = data;
                    var select = $('#variants-type-attributes');
                    select.html("");
                    $.each(data, function (key, value) {
                        select.append($("<option></option>")
                            .attr("value", value.id)
                            .text(value.title));
                    });
                });
            }
        }

        updateVariantTypeAttributes();

        $("#add-product-variant").click(function (e) {
            e.preventDefault();
/*            var attributeId = $('#variants-type-attributes').val();
            var variantAttribute = typeAttributes.filter(function (el) {
                return el.id == attributeId;
            }).pop();*/
            var tbody = $('#time-variants');
            $.get(
                '<?= Yii::app()->createUrl('/booktour/datesBackend/timeRow');?>',
                function (data) {
                    tbody.append(data);
                    $('.hummer-time', tbody).timepicker({
                        showMeridian: false,
                    });
                }
            );
        });

        $('#time-variants').on('click', '.remove-variant', function (e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        });

        $('#product-type').on('change',function () {
            var typeId = $(this).val();
            if (typeId) {
                $('#attributes-panel').load('<?= Yii::app()->createUrl('/store/productBackend/typeAttributesForm');?>/' + typeId);
                updateVariantTypeAttributes();
            }
            else {
                $('#attributes-panel').html('');
                $('#variants-type-attributes').html('');
            }
        });

        $('#button-add-image').on('click',function () {
            var newImage = $("#product-images .image-template").clone().removeClass('image-template').removeClass('hidden');
            newImage.appendTo("#product-images");
            newImage.find(".image-file").attr('name', 'ProductImage[][name]');
            newImage.find(".image-title").attr('name', 'ProductImage[][title]');
            return false;
        });

        $(this).closest('.product-image').remove();

        $('#product-images').on('click', '.button-delete-image', function () {
            $(this).closest('.row').remove();
        });

        $('.product-delete-image').on('click', function (event) {
            event.preventDefault();
            var deleteUrl = $(this).attr('href');
            var blockForDelete = $(this).closest('.product-image');
            $.ajax({
                type: "POST",
                data: {
                    'id': $(this).data('id'),
                    '<?= Yii::app()->getRequest()->csrfTokenName;?>': '<?= Yii::app()->getRequest()->csrfToken;?>'
                },
                url: '<?= Yii::app()->createUrl('/store/productBackend/deleteImage');?>',
                success: function () {
                    blockForDelete.remove();
                }
            });
        });

        function activateFirstTabWithErrors() {
            var tab = $('.has-error').parents('.tab-pane').first();
            if (tab.length) {
                var id = tab.attr('id');
                $('a[href="#' + id + '"]').tab('show');
            }
        }

        activateFirstTabWithErrors();
    });
</script>
