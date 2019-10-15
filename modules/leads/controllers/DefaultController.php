<?php

namespace app\modules\leads\controllers;

use app\modules\leads\models\ClicksLeads;
use app\modules\profile\models\Profile;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default controller for the `leads` module
 */
class DefaultController extends Controller
{
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
     * Renders the index view for the module
     * @return string
     */

    public function actionIndex()
    {

        $profile = Profile::findOne(Yii::$app->user->id);

        if($profile->user->getRole() == 'admin'){

            $leads = ClicksLeads::find()
                ->orderBy('id asc')
                ->all();

        }else{

            $leads = ClicksLeads::find()
                ->orderBy('id asc')
                ->where(['user_id'=>Yii::$app->user->id])
                ->all();

        }

        return $this->render('index',[
            'leads' => $leads,
            'profile' => $profile,
        ]);
    }
}
