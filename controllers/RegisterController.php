<?php
/**
 * Created by PhpStorm.
 * User: mint2
 * Date: 27.07.17
 * Time: 16:52
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\form\SignupForm;

class RegisterController extends Controller
{
    public function actionIndex()
    {
        $this->layout = false;

        $model = new SignupForm();
//        var_dump(Yii::$app->request->post());
        if(Yii::$app->request->post())
        {
            $model->load(Yii::$app->request->post());

            if($user = $model->signup())
            {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                } else {
                    return $this->redirect(['auth/login']);
                }
            }
        }
        return $this->render('register', [
            'model' => $model
        ]);
    }
}