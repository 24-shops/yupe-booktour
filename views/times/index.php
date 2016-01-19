<?php
/**
 * Отображение для index:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 **/
    $this->breadcrumbs = array(
        Yii::app()->getModule('booktour')->getCategory() => array(),
        Yii::t('booktour', 'Время') => array('/booktour/times/index'),
        Yii::t('booktour', 'Управление'),
    );

    $this->pageTitle = Yii::t('booktour', 'Время - управление');

    $this->menu = array(
        array('icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('booktour', 'Управление Временем'), 'url' => array('/booktour/times/index')),
        array('icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('booktour', 'Добавить Время'), 'url' => array('/booktour/times/create')),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('booktour', 'Время'); ?>
        <small><?php echo Yii::t('booktour', 'управление'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?php echo Yii::t('booktour', 'Поиск Времени');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
    <?php
Yii::app()->clientScript->registerScript('search', "
    $('.search-form form').submit(function () {
        $.fn.yiiGridView.update('times-grid', {
            data: $(this).serialize()
        });

        return false;
    });
");
$this->renderPartial('_search', array('model' => $model));
?>
</div>

<br/>

<p> <?php echo Yii::t('booktour', 'В данном разделе представлены средства управления Временем'); ?>
</p>

<?php
 $this->widget('yupe\widgets\CustomGridView', array(
'id'           => 'times-grid',
'type'         => 'striped condensed',
'dataProvider' => $model->search(),
'filter'       => $model,
'columns'      => array(
        'id',
        'time',
        'maximum_quantity',
        'dates_id',
        'status',
array(
'class' => 'yupe\widgets\CustomButtonColumn',
),
),
)); ?>
