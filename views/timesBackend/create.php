<?php
/**
 * Отображение для create:
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
        Yii::t('booktour', 'Добавление'),
    );

    $this->pageTitle = Yii::t('booktour', 'Время - добавление');

    $this->menu = array(
        array('icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('booktour', 'Управление Временем'), 'url' => array('/booktour/times/index')),
        array('icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('booktour', 'Добавить Время'), 'url' => array('/booktour/times/create')),
    );
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('booktour', 'Время'); ?>
        <small><?php echo Yii::t('booktour', 'добавление'); ?></small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model, 'dates' => $dates)); ?>