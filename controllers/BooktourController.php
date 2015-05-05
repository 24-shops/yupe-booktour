<?php 
/**
* 
*/
class BooktourController extends \yupe\components\controllers\FrontController
{
    
    public function actionIndex()
    {
        $model = new ApplicationUsers;
        if (isset($_POST['ApplicationUsers'])) {
            $model->attributes = $_POST['ApplicationUsers'];
            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('booktour', 'Запись добавлена!')
                );
            }
        }
        $this->render('index', [
            'model'=>$model
        ]);
    }
}
 ?>