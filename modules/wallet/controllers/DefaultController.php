<?php

namespace app\modules\wallet\controllers;

use app\modules\wallet\models\Wallet;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default controller for the `wallet` module
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
                        'roles' => ['admin'],
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

        $wallets = Wallet::find()->orderBy('id asc')->all();
        return $this->render('index',[
            'wallets' => $wallets,
        ]);
    }
}
