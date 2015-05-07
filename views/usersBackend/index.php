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
        Yii::t('booktour', 'Пользователи') => ['/booktour/usersBackend/index'],
        Yii::t('booktour', 'Управление'),
    ];

    $this->pageTitle = Yii::t('booktour', 'Пользователи - управление');

    $this->menu = [
        ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('booktour', 'Управление пользователями'), 'url' => ['/booktour/usersBackend/index']],
        ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('booktour', 'Добавить пользователя'), 'url' => ['/booktour/usersBackend/create']],
    ];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('booktour', 'Пользователи'); ?>
        <small><?php echo Yii::t('booktour', 'управление'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?php echo Yii::t('booktour', 'Поиск пользователей');?>
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

<p> <?php echo Yii::t('booktour', 'В данном разделе представлены средства управления пользователями'); ?>
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
        // 'patronymic',
        'mail',
        'phone',
        'date_reservation',
        /*
        'date_of_birth',
        'quantity',
        'dates_id',
        */
        [
            'class' => 'yupe\widgets\CustomButtonColumn',
        ],
    ],
]); ?>
