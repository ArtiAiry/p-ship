<?php
/**
 * Created by PhpStorm.
 * User: Diwork
 * Date: 07.08.2018
 * Time: 10:10
 */

namespace app\modules\settings\controllers;


use app\models\User;
use app\modules\leads\models\ClicksLeads;
use app\modules\payout\models\Payout;
use app\modules\profile\models\Profile;
use app\modules\settings\Module;
use app\modules\wallet\models\Wallet;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Profile models.
     * @return mixed
     */

    public function actionIndex()
    {
        $payout = new Payout();
        $user = User::find()->where(['id' => Yii::$app->user->id])->one();
        $profile = Profile::find()->where(['id' => Yii::$app->user->id])->one();
        $wallet = Wallet::findOne(Yii::$app->user->id);
        $leads = ClicksLeads::find()->orderBy('id asc')->where(['user_id' => Yii::$app->user->id])->all();
        $sumLead = new ClicksLeads();


        if ($profile->load(Yii::$app->request->post()) && $profile->save(false)) {

            Yii::$app->session->setFlash('success', Module::t('settings','Profile\'s settings successfully saved.'));
            return $this->redirect(['/settings']);
        }

        return $this->render('index', [

            'user' => $user,
            'profile' => $profile,
            'wallet' => $wallet,
            'payout' => $payout,
            'leads' => $leads,
            'sumLead' => $sumLead,
        ]);
    }
}