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
use app\modules\wallet\models\Wallet;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class SettingsController extends Controller
{

    public function actionEdit($id)
    {

        $payout = new Payout();
        $user = User::findOne($id);
        $profile = Profile::findOne($id);
//        $sources = Source::find()->orderBy('id asc')->where(['user_id'=>Yii::$app->user->id])->all();
        $wallet = Wallet::findOne(Yii::$app->user->id);
        $lead = ClicksLeads::findOne(Yii::$app->user->id);

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
//            'sources' => $sources,
            'lead' => $lead,
        ]);
    }

}