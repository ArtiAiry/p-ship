<?php
/**
 * Created by PhpStorm.
 * User: Diwork
 * Date: 29.06.2018
 * Time: 19:40
 */

namespace app\modules\settings\controllers;

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

    public function actionEdit()
    {
        $payout = new Payout();
        $user = User::find()->where(['id' => Yii::$app->user->id])->one();
        $profile = Profile::find()->where(['id' => Yii::$app->user->id])->one();
        $wallet = Wallet::findOne(Yii::$app->user->id);
        $leads = ClicksLeads::find()->orderBy('id asc')->where(['user_id' => Yii::$app->user->id])->all();

        if (!isset($user, $profile)) {
            throw new NotFoundHttpException(Module::t('settings', 'Profile\'s settings successfully saved.'));
        }

        if ($user->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post())) {
            $isValid = $user->validate();
            $isValid = $profile->validate() && $isValid;
            if ($isValid) {
                $user->save(false);
                $profile->save(false);
                Yii::$app->session->setFlash('success', Module::t('settings', 'Profile\'s settings successfully saved.'));
                return $this->redirect(['edit']);
            } else {
                Yii::$app->session->setFlash('danger', Module::t('settings', 'Error in saving Profile\'s settings.'));
                return $this->redirect(['edit']);
            }
        }

        return $this->render('edit', [

            'user' => $user,
            'profile' => $profile,
            'wallet' => $wallet,
            'payout' => $payout,
            'leads' => $leads,
        ]);
    }


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


    public function actionTest($id)
    {
        $payout = new Payout();
        $user = User::findOne($id);
        $profile = Profile::findOne($id);
        $wallet = Wallet::findOne(Yii::$app->user->id);
        $lead = ClicksLeads::findOne(Yii::$app->user->id);

        if ($profile['user_id'] != Yii::$app->user->id) {
            throw new NotFoundHttpException("Профиль пользователя не найден.");
        } else {
            if (!isset($user, $profile)) {
                throw new NotFoundHttpException("Профиль пользователя не найден.");
            }

            if ($user->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post())) {
                $isValid = $user->validate();
                $isValid = $profile->validate() && $isValid;
                if ($isValid) {
                    $user->save(false);
                    $profile->save(false);
                    Yii::$app->session->setFlash('success', 'Profile Settings successfully saved.');
                    return $this->redirect(['edit', 'id' => $id]);
                }
            }


            return $this->render('edit', [

                'user' => $user,
                'profile' => $profile,
                'wallet' => $wallet,
                'payout' => $payout,
                'lead' => $lead,
            ]);
        }

    }


}