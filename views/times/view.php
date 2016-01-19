<?php
/**
 * Отображение для view:
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
        $model->id,
    );

    $this->pageTitle = Yii::t('booktour', 'Время - просмотр');

    $this->menu = array(
        array('icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('booktour', 'Управление Временем'), 'url' => array('/booktour/times/index')),
        array('icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('booktour', 'Добавить Время'), 'url' => array('/booktour/times/create')),
        array('label' => Yii::t('booktour', 'Время') . ' «' . mb_substr($model->id, 0, 32) . '»'),
        array('icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('booktour', 'Редактирование Времени'), 'url' => array(
            '/booktour/times/update',
            'id' => $model->id
        )),
        array('icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('booktour', 'Просмотреть Время'), 'url' => array(
            '/booktour/times/view',
            'id' => $model->id
        )),
        array('icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('booktour', 'Удалить Время'), 'url' => '#', 'linkOptions' => array(
            'submit' => array('/booktour/times/delete', 'id' => $model->id),
            'confirm' => Yii::t('booktour', 'Вы уверены, что хотите удалить Время?'),
            'csrf' => true,
        )),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('booktour', 'Просмотр') . ' ' . Yii::t('booktour', 'Времени'); ?>        <br/>
        <small>&laquo;<?php echo $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
'data'       => $model,
'attributes' => array(
        'id',
        'time',
        'maximum_quantity',
        'dates_id',
        'status',
),
)); ?>
