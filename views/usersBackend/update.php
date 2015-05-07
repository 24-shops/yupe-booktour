<?php
/**
 * Отображение для update:
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
        $model->name => ['/booktour/usersBackend/view', 'id' => $model->id],
        Yii::t('booktour', 'Редактирование'),
    ];

    $this->pageTitle = Yii::t('booktour', 'Пользователи - редактирование');

    $this->menu = [
        ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('booktour', 'Управление пользователями'), 'url' => ['/booktour/usersBackend/index']],
        ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('booktour', 'Добавить пользователя'), 'url' => ['/booktour/usersBackend/create']],
        ['label' => Yii::t('booktour', 'Пользователь') . ' «' . mb_substr($model->id, 0, 32) . '»'],
        ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('booktour', 'Редактирование пользователя'), 'url' => [
            '/booktour/usersBackend/update',
            'id' => $model->id
        ]],
        ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('booktour', 'Просмотреть пользователя'), 'url' => [
            '/booktour/usersBackend/view',
            'id' => $model->id
        ]],
        ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('booktour', 'Удалить пользователя'), 'url' => '#', 'linkOptions' => [
            'submit' => ['/booktour/usersBackend/delete', 'id' => $model->id],
            'confirm' => Yii::t('booktour', 'Вы уверены, что хотите удалить пользователя?'),
            'csrf' => true,
        ]],
    ];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('booktour', 'Редактирование') . ' ' . Yii::t('booktour', 'пользователя'); ?>        <br/>
        <small>&laquo;<?php echo $model->name; ?>&raquo;</small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>