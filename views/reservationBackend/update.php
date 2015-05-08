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
        Yii::t('booktour', 'Заявки на бронь') => ['/booktour/reservationBackend/index'],
        $model->name => ['/booktour/reservationBackend/view', 'id' => $model->id],
        Yii::t('booktour', 'Редактирование'),
    ];

    $this->pageTitle = Yii::t('booktour', 'Заявки на бронь - редактирование');

    $this->menu = [
        ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('booktour', 'Управление заявками на бронь'), 'url' => ['/booktour/reservationBackend/index']],
        ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('booktour', 'Добавить заявку на бронь'), 'url' => ['/booktour/reservationBackend/create']],
        ['label' => Yii::t('booktour', 'Заявка на бронь') . ' «' . mb_substr($model->id, 0, 32) . '»'],
        ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('booktour', 'Редактирование заявки на бронь'), 'url' => [
            '/booktour/reservationBackend/update',
            'id' => $model->id
        ]],
        ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('booktour', 'Просмотреть заявку на бронь'), 'url' => [
            '/booktour/reservationBackend/view',
            'id' => $model->id
        ]],
        ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('booktour', 'Удалить заявку на бронь'), 'url' => '#', 'linkOptions' => [
            'submit' => ['/booktour/reservationBackend/delete', 'id' => $model->id],
            'confirm' => Yii::t('booktour', 'Вы уверены, что хотите удалить заявку на бронь?'),
            'csrf' => true,
        ]],
    ];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('booktour', 'Редактирование') . ' ' . Yii::t('booktour', 'заявки на бронь'); ?>        <br/>
        <small>&laquo;<?php echo $model->name; ?>&raquo;</small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>