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
        Yii::t('booktour', 'Даты') => ['/booktour/datesBackend/index'],
        $model->id => ['/booktour/datesBackend/view', 'id' => $model->id],
        Yii::t('booktour', 'Редактирование'),
    ];

    $this->pageTitle = Yii::t('booktour', 'Даты - редактирование');

    $this->menu = [
        ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('booktour', 'Управление Датами'), 'url' => ['/booktour/datesBackend/index']],
        ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('booktour', 'Добавить Дату'), 'url' => ['/booktour/datesBackend/create']],
        ['label' => Yii::t('booktour', 'Дата') . ' «' . mb_substr($model->id, 0, 32) . '»'],
        ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('booktour', 'Редактирование Даты'), 'url' => [
            '/booktour/datesBackend/update',
            'id' => $model->id
        ]],
        ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('booktour', 'Просмотреть Дату'), 'url' => [
            '/booktour/datesBackend/view',
            'id' => $model->id
        ]],
        ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('booktour', 'Удалить Дату'), 'url' => '#', 'linkOptions' => [
            'submit' => ['/booktour/datesBackend/delete', 'id' => $model->id],
            'confirm' => Yii::t('booktour', 'Вы уверены, что хотите удалить Дату?'),
            'csrf' => true,
        ]],
    ];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('booktour', 'Редактирование') . ' ' . Yii::t('booktour', 'Даты'); ?>        <br/>
        <small>&laquo;<?php echo $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', ['model' => $model, 'dates' => $dates]); ?>