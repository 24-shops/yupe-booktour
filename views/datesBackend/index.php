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
    $this->breadcrumbs = [
        Yii::app()->getModule('booktour')->getCategory() => [],
        Yii::t('booktour', 'Даты') => ['/booktour/datesBackend/index'],
        Yii::t('booktour', 'Управление'),
    ];

    $this->pageTitle = Yii::t('booktour', 'Даты - управление');

    $this->menu = [
        ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('booktour', 'Управление Датами'), 'url' => ['/booktour/datesBackend/index']],
        ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('booktour', 'Добавить Дату'), 'url' => ['/booktour/datesBackend/create']],
    ];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('booktour', 'Даты'); ?>
        <small><?php echo Yii::t('booktour', 'управление'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?php echo Yii::t('booktour', 'Поиск Дат');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
    <?php
Yii::app()->clientScript->registerScript('search', "
    $('.search-form form').submit(function () {
        $.fn.yiiGridView.update('dates-grid', {
            data: $(this).serialize()
        });

        return false;
    });
");
$this->renderPartial('_search', ['model' => $model]);
?>
</div>

<br/>

<p> <?php echo Yii::t('booktour', 'В данном разделе представлены средства управления Датами'); ?>
</p>

<?php
 $this->widget('yupe\widgets\CustomGridView', [
    'id'           => 'dates-grid',
    'type'         => 'striped condensed',
    'dataProvider' => $model->search(),
    'filter'       => $model,
    'columns'      => [
                'id',
        'date_reservation'=>[
            'name'=>'date_reservation',
            'value'=>'$data->date_reservation',
        ],
        'opening_booking'=>[
            'name'=>'opening_booking',
            'value'=>'$data->opening_booking',
        ],
        'closing_booking'=>[
            'name'=>'closing_booking',
            'value'=>'$data->closing_booking',
        ],
        'maximum_quantity',
        'status'=>[
            'name'=>'status',
            'value'=>'$data->getStatus()'
        ],
        [
            'class' => 'yupe\widgets\CustomButtonColumn',
        ],
    ],
]); ?>
