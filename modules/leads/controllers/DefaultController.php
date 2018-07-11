<?php

namespace app\modules\leads\controllers;

use app\modules\leads\models\ClicksLeads;
use app\modules\profile\models\Profile;
use Yii;
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
        $profile = Profile::findOne(Yii::$app->user->id);
//        $counting = $leads->getCountStatus();
        return $this->render('index',[
            'leads' => $leads,
            'profile' => $profile,
        ]);
    }
}
