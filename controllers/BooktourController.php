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
            //echo '<pre>';
            //print_r($model);
            //Yii::app()->end();
            if ($model->save()) {
                if ($this->mail($model))
                {
                    Yii::app()->user->setFlash(
                        yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                        Yii::t('booktour', 'Вы успешно забронировали место в экскурсии, которая будет проходить ' . $model->date_reservation . '.')
                    );
                    $this->refresh();
                }
            }
        }
        $this->render('index', [
            'model'=>$model
        ]);
    }

    public function mail($model)
    {
        //$params = json_decode($mail)[0];
        $txt_message = $this->renderPartial('mail/body', array('model'=>$model), true, false);
        $headers = 'From:'.'orenbeer.ru'."\r\n".
                        'Content-type: text/html;'.
                        'charset=utf-8'."\r\n".
                        'X-Mailer: PHP/' . phpversion();
        $result = mail(
                Yii::app()->getModule('booktour')->email,
                'Уведомление о новой брони',
                $txt_message,
                $headers
            );
        return $result;
    }
}
 ?>