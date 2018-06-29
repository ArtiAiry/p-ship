<?php
/**
 * Created by PhpStorm.
 * User: Diwork
 * Date: 02.06.2018
 * Time: 20:57
 */

namespace app\modules\statistics\controllers;


use app\modules\leads\models\ClicksLeads;
use Codeception\Module\Cli;
use yii\web\Controller;

class StatisticsController extends Controller
{

    public function actionSource()
    {
        $leads = ClicksLeads::find()->select([
            '*',
            'count_lead' => 'COUNT(*)',
            'count_status_unknown' => 'COUNT(CASE WHEN leads_status_id = 1 THEN 1 ELSE NULL END)',
            'count_status_rejected' => 'COUNT(CASE WHEN leads_status_id = 2 THEN 1 ELSE NULL END)',
            'count_status_approved' => 'COUNT(CASE WHEN leads_status_id = 3 THEN 1 ELSE NULL END)',
            'count_status_sold' => 'COUNT(CASE WHEN leads_status_id = 4 THEN 1 ELSE NULL END)',
            'sum_lead_sold_summary' => 'SUM(CASE WHEN leads_status_id = 4 THEN price ELSE 0 END)',
        ])->groupBy('source')->all();
        return $this->render('source',
            [
            'leads'=>$leads,
            ]);
    }

    public function actionGoods()
    {
        $leads = ClicksLeads::find()->select(['*',
            'count_lead' => 'COUNT(*)',
            'count_status_unknown' => 'COUNT(CASE WHEN leads_status_id = 1 THEN 1 ELSE NULL END)',
            'count_status_rejected' => 'COUNT(CASE WHEN leads_status_id = 2 THEN 1 ELSE NULL END)',
            'count_status_approved' => 'COUNT(CASE WHEN leads_status_id = 3 THEN 1 ELSE NULL END)',
            'count_status_sold' => 'COUNT(CASE WHEN leads_status_id = 4 THEN 1 ELSE NULL END)',
            'sum_lead_sold_summary' => 'SUM(CASE WHEN leads_status_id = 4 THEN price ELSE 0 END)',
        ])->groupBy('product_id')->all();
        return $this->render('goods',
            [
                'leads'=>$leads,
            ]);
    }


    public function actionDate()
    {
        $leads = ClicksLeads::find()->select([
            '*',
            'count_lead' => 'COUNT(*)',
            'count_status_unknown' => 'COUNT(CASE WHEN leads_status_id = 1 THEN 1 ELSE NULL END)',
            'count_status_rejected' => 'COUNT(CASE WHEN leads_status_id = 2 THEN 1 ELSE NULL END)',
            'count_status_approved' => 'COUNT(CASE WHEN leads_status_id = 3 THEN 1 ELSE NULL END)',
            'count_status_sold' => 'COUNT(CASE WHEN leads_status_id = 4 THEN 1 ELSE NULL END)',
            'sum_lead_sold_summary' => 'SUM(CASE WHEN leads_status_id = 4 THEN price ELSE 0 END)',
            'date' => 'DATE(created_at)',


        ])->groupBy('DATE(created_at)')->all();




        return $this->render('date',
            [
                'leads'=>$leads,
            ]);
    }


}