<?php

namespace app\modules\wallet\controllers;

use app\modules\wallet\models\Wallet;
use yii\web\Controller;

/**
 * Default controller for the `wallet` module
 */
class DefaultController extends Controller
{
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
