<?php

namespace app\modules\payout\controllers;

use app\modules\payout\models\Payout;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default controller for the `payout` module
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
                        'allow' => true,
                        'actions' => ['index'],
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

        $payouts = Payout::find()->orderBy('id asc')->all();
        return $this->render('index',[
            'payouts' => $payouts,
        ]);
    }
}
