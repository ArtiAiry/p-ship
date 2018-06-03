<?php
/**
 * Created by PhpStorm.
 * User: Diwork
 * Date: 02.06.2018
 * Time: 20:57
 */

namespace app\modules\statistics\controllers;


use app\modules\leads\models\ClicksLeads;
use yii\web\Controller;

class StatisticsController extends Controller
{

    public function actionSource()
    {
        $leads = ClicksLeads::find()->select(['*', 'count' => 'COUNT(*)'])->groupBy('source')->all();
        return $this->render('source',
            [
            'leads'=>$leads,
        ]);
    }

    public function actionProduct()
    {
        $leads = ClicksLeads::find()->select(['*', 'count' => 'COUNT(*)'])->groupBy('product_id')->all();
        return $this->render('product',
            [
                'leads'=>$leads,
            ]);
    }


    public function actionDate()
    {
        $leads = ClicksLeads::find()->select(['*', 'count' => 'COUNT(*)'])->groupBy('created_at')->all();
        return $this->render('source',
            [
                'leads'=>$leads,
            ]);
    }



}