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
    $this->breadcrumbs = [
        Yii::app()->getModule('booktour')->getCategory() => [],
        Yii::t('booktour', 'Пользователи') => ['/booktour/usersBackend/index'],
        Yii::t('booktour', 'Добавление'),
    ];

    $this->pageTitle = Yii::t('booktour', 'Пользователи - добавление');

    $this->menu = [
        ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('booktour', 'Управление пользователями'), 'url' => ['/booktour/usersBackend/index']],
        ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('booktour', 'Добавить пользователя'), 'url' => ['/booktour/usersBackend/create']],
    ];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('booktour', 'Пользователи'); ?>
        <small><?php echo Yii::t('booktour', 'добавление'); ?></small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>