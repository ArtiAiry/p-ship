<?php

namespace app\modules\leads\controllers;

use app\modules\leads\models\ClicksLeads;
use yii\web\Controller;

/**
 * Default controller for the `leads` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        $leads = ClicksLeads::find()->orderBy('id asc')->all();
        return $this->render('index',[
            'leads' => $leads,
        ]);
    }
}
