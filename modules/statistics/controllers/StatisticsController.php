<?php
/**
 * Created by PhpStorm.
 * User: Diwork
 * Date: 02.06.2018
 * Time: 20:57
 */

namespace app\modules\statistics\controllers;


use app\modules\leads\models\ClicksLeads;
use app\modules\profile\models\Profile;
use Codeception\Module\Cli;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class StatisticsController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['source','goods','date'],
                'rules' => [
                    [
                        'actions' => ['source','goods','date'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    public function actionSource()
    {
        $leads = ClicksLeads::getLeadsBySource();

        return $this->render('source',
            [
                'leads' => $leads,
            ]);
    }

    public function actionGoods()
    {

        $leads = ClicksLeads::getLeadsByProducts();

        return $this->render('goods',
            [
                'leads' => $leads,
            ]);

    }

    public function actionDate()
    {
        $leads = ClicksLeads::getLeadsByDate();

        return $this->render('date',
            [
                'leads' => $leads,
            ]);
    }


}