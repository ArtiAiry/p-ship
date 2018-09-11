<?php
/**
 * Created by PhpStorm.
 * User: mint2
 * Date: 27.07.17
 * Time: 16:52
 */

namespace app\controllers;

use app\models\form\EmailConfirmForm;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use app\models\form\SignupForm;

class RegisterController extends Controller
{
    public function actionIndex()
    {
        $this->layout = false;

        $model = new SignupForm();
        if(Yii::$app->request->post())
        {
            $model->load(Yii::$app->request->post());

            if($user = $model->signup())
            {
                Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Please confirm your Email.'));
                return $this->goHome();
            }
        }
        return $this->render('register', [
            'model' => $model
        ]);
    }

    public function actionEmailConfirm($token)
    {

        $this->layout = false;

        try {
            $model = new EmailConfirmForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($model->confirmEmail()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Thanks! Your Email is confirmed.'));
        } else {
            Yii::$app->getSession()->setFlash('error', Yii::t('app', 'Email confirmation error.'));
        }
        return $this->goHome();
    }
}