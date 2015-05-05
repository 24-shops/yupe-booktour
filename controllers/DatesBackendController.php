<?php
/**
* Класс DatesBackendController:
*
*   @category Yupeyupe\components\controllers\BackController
*   @package  yupe
*   @author   Yupe Team <team@yupe.ru>
*   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
*   @link     http://yupe.ru
**/
class DatesBackendController extends yupe\components\controllers\BackController
    {
    /**
    * Отображает Дату по указанному идентификатору
    *
    * @param integer $id Идинтификатор Дату для отображения
    *
    * @return void
    */
    public function actionView($id)
    {
        $this->render('view', array('model' => $this->loadModel($id)));
    }

    /**
    * Создает новую модель Даты.
    * Если создание прошло успешно - перенаправляет на просмотр.
    *
    * @return void
    */
    public function actionCreate()
    {
        $model = new Dates;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Dates'])) {
            $model->attributes = $_POST['Dates'];

            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('booktour', 'Запись добавлена!')
                );

                if (!isset($_POST['submit-type']))
                    $this->redirect(array('update', 'id' => $model->id));
                else
                    $this->redirect(array($_POST['submit-type']));
            }
        }
        $this->render('create', array('model' => $model));
    }

    /**
    * Редактирование Даты.
    *
    * @param integer $id Идинтификатор Дату для редактирования
    *
    * @return void
    */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Dates'])) {
            $model->attributes = $_POST['Dates'];

            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('booktour', 'Запись обновлена!')
                );

                if (!isset($_POST['submit-type']))
                    $this->redirect(array('update', 'id' => $model->id));
                else
                    $this->redirect(array($_POST['submit-type']));
            }
        }
        $this->render('update', array('model' => $model));
    }

    /**
    * Удаляет модель Даты из базы.
    * Если удаление прошло успешно - возвращется в index
    *
    * @param integer $id идентификатор Даты, который нужно удалить
    *
    * @return void
    */
    public function actionDelete($id)
    {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            // поддерживаем удаление только из POST-запроса
            $this->loadModel($id)->delete();

            Yii::app()->user->setFlash(
                yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                Yii::t('booktour', 'Запись удалена!')
            );

            // если это AJAX запрос ( кликнули удаление в админском grid view), мы не должны никуда редиректить
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        } else
            throw new CHttpException(400, Yii::t('booktour', 'Неверный запрос. Пожалуйста, больше не повторяйте такие запросы'));
    }

    /**
    * Управление Датами.
    *
    * @return void
    */
    public function actionIndex()
    {
        $model = new Dates('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Dates']))
            $model->attributes = $_GET['Dates'];
        $this->render('index', array('model' => $model));
    }

    /**
    * Возвращает модель по указанному идентификатору
    * Если модель не будет найдена - возникнет HTTP-исключение.
    *
    * @param integer идентификатор нужной модели
    *
    * @return void
    */
    public function loadModel($id)
    {
        $model = Dates::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('booktour', 'Запрошенная страница не найдена.'));

        return $model;
    }

    /**
    * Производит AJAX-валидацию
    *
    * @param CModel модель, которую необходимо валидировать
    *
    * @return void
    */
    protected function performAjaxValidation(Dates $model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'dates-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
