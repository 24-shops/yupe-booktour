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
        Yii::t('booktour', 'Заявки на бронь') => ['/booktour/reservationBackend/index'],
        Yii::t('booktour', 'Управление'),
    ];

    $this->pageTitle = Yii::t('booktour', 'Заявки на бронь - управление');

    $this->menu = [
        ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('booktour', 'Управление заявками на бронь'), 'url' => ['/booktour/reservationBackend/index']],
        ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('booktour', 'Добавить заявку на бронь'), 'url' => ['/booktour/reservationBackend/create']],
    ];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('booktour', 'Заявки на бронь'); ?>
        <small><?php echo Yii::t('booktour', 'управление'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?php echo Yii::t('booktour', 'Поиск заявок на бронь');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
    <?php
Yii::app()->clientScript->registerScript('search', "
    $('.search-form form').submit(function () {
        $.fn.yiiGridView.update('application-users-grid', {
            data: $(this).serialize()
        });

        return false;
    });
");
$this->renderPartial('_search', ['model' => $model]);
?>
</div>

<br/>

<p> <?php echo Yii::t('booktour', 'В данном разделе представлены средства управления заявками на бронь'); ?>
</p>

<?php
 $this->widget('yupe\widgets\CustomGridView', [
    'id'           => 'application-users-grid',
    'type'         => 'striped condensed',
    'dataProvider' => $model->search(),
    'filter'       => $model,
    'columns'      => [
                'id',
        'surname',
        'name',
        'patronymic',
        'mail',
        'phone',
        /*
        'date_of_birth',
        'date_reservation',
        'quantity',
        'dates_id',
        */
        [
            'class' => 'yupe\widgets\CustomButtonColumn',
        ],
    ],
]); ?>
