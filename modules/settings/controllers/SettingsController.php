<?php
/**
 * Created by PhpStorm.
 * User: Diwork
 * Date: 29.06.2018
 * Time: 19:40
 */

namespace app\modules\settings\controllers;

use app\models\form\PasswordResetRequestForm;
use app\models\User;
use app\modules\leads\models\ClicksLeads;
use app\modules\payout\models\Payout;
use app\modules\profile\models\Profile;
use app\modules\settings\Module;
use app\modules\wallet\models\Wallet;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class SettingsController extends Controller
{


    public function actionWallet()
    {

        $wallet = Wallet::find()->where(['id' => Yii::$app->user->id])->one();

        if ($wallet->load(Yii::$app->request->post())) {

            $isValid = $wallet->validate();

            if ($isValid) {
                $wallet->save(false);
                Yii::$app->session->setFlash('success', Module::t('settings', 'Wallet\'s settings successfully saved.'));
                return $this->redirect(['/settings/edit']);
            } else {
                Yii::$app->session->setFlash('danger', Module::t('settings', 'Error in saving Wallet\'s settings.'));
                return $this->redirect(['/settings/edit']);
            }
        }
        return $this->render('wallet', [
            'wallet' => $wallet,
        ]);
    }

    public function actionResetPassword()
    {

        $model = new PasswordResetRequestForm();
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }


}