<?php
/**
 * Created by PhpStorm.
 * User: Diwork
 * Date: 29.06.2018
 * Time: 19:40
 */

namespace app\modules\settings\controllers;

use app\modules\settings\models\form\EmailResetRequestForm;
use app\modules\settings\models\form\PasswordResetRequestForm;
use app\models\User;
use app\modules\settings\models\form\ResetEmailForm;
use app\modules\settings\models\form\ResetPasswordForm;
use app\modules\settings\Module;
use app\modules\wallet\models\Wallet;
use Yii;
use yii\base\InvalidParamException;
use yii\filters\AccessControl;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class SettingsController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['wallet','change-password','change-email','password','email'],
                'rules' => [
                    [
                        'actions' => ['wallet','change-password','change-email','password','email'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionWallet()
    {

        $wallet = Wallet::find()->where(['id' => Yii::$app->user->id])->one();

        if ($wallet->load(Yii::$app->request->post())) {

            $isValid = $wallet->validate();

            if ($isValid) {
                $wallet->save(false);
                Yii::$app->session->setFlash('success', Module::t('settings', 'Wallet\'s settings successfully saved.'));
                return $this->redirect(['/settings']);
            } else {
                Yii::$app->session->setFlash('danger', Module::t('settings', 'Error in saving Wallet\'s settings.'));
                return $this->redirect(['/settings']);
            }
        }
        return $this->render('wallet', [
            'wallet' => $wallet,
        ]);
    }

    public function actionPassword()
    {

        $user = User::find()->where(['id'=>Yii::$app->user->id])->one();
        $model = new PasswordResetRequestForm();

        $model->email = $user->email;
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', Module::t('settings', 'Check your email for further instructions.'));

                return $this->redirect(['/settings']);
            } else {
                Yii::$app->session->setFlash('error', Module::t('settings', 'Sorry, we are unable to reset password for email provided.'));
            }
            return $this->redirect(['/settings']);
    }


    public function actionEmail()
    {

        $user = User::find()->where(['id'=>Yii::$app->user->id])->one();
        $model = new EmailResetRequestForm();

        $model->email = $user->email;
        if ($model->sendEmail()) {
            Yii::$app->session->setFlash('success', Module::t('settings', 'Check your email for further instructions.'));

            return $this->redirect(['/settings']);
        } else {
            Yii::$app->session->setFlash('error', Module::t('settings', 'Sorry, we are unable to reset password for email provided.'));
        }
        return $this->redirect(['/settings']);
    }

    public function actionChangePassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);

        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success',  Module::t('settings','New password was saved.'));

            return $this->goHome();
        }

        return $this->render('changePassword', [
            'model' => $model,
        ]);
    }


    public function actionChangeEmail($token)
    {
        try {
            $model = new ResetEmailForm($token);

        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetEmail()) {
            Yii::$app->session->setFlash('success',  Module::t('settings','New email was saved.'));

            return $this->goHome();
        }

        return $this->render('changeEmail', [
            'model' => $model,
        ]);
    }

}