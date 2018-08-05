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
use yii\web\Controller;

class StatisticsController extends Controller
{


    public function actionSource()
    {
        $profile = Profile::find()->where(['id' => Yii::$app->user->id])->one();

        if ($profile->user->getRole() == 'admin') {

            $leads = ClicksLeads::find()->select([
                'source',
                'count_lead' => 'COUNT(*)',
                'count_status_unknown' => 'COUNT(CASE WHEN leads_status_id = 1 THEN 1 ELSE NULL END)',
                'count_status_rejected' => 'COUNT(CASE WHEN leads_status_id = 2 THEN 1 ELSE NULL END)',
                'count_status_approved' => 'COUNT(CASE WHEN leads_status_id = 3 THEN 1 ELSE NULL END)',
                'count_status_sold' => 'COUNT(CASE WHEN leads_status_id = 4 THEN 1 ELSE NULL END)',
                'sum_lead_sold_summary' => 'SUM(CASE WHEN leads_status_id = 4 THEN price ELSE 0 END)',
            ])
                ->groupBy('source')
                ->all();

        } else {

            $leads = ClicksLeads::find()->select([
                'source',
                'count_lead' => 'COUNT(*)',
                'count_status_unknown' => 'COUNT(CASE WHEN leads_status_id = 1 THEN 1 ELSE NULL END)',
                'count_status_rejected' => 'COUNT(CASE WHEN leads_status_id = 2 THEN 1 ELSE NULL END)',
                'count_status_approved' => 'COUNT(CASE WHEN leads_status_id = 3 THEN 1 ELSE NULL END)',
                'count_status_sold' => 'COUNT(CASE WHEN leads_status_id = 4 THEN 1 ELSE NULL END)',
                'sum_lead_sold_summary' => 'SUM(CASE WHEN leads_status_id = 4 THEN price ELSE 0 END)',
            ])
                ->where(['user_id' => Yii::$app->user->id])
                ->groupBy('source')
                ->all();


        }

        return $this->render('source',
            [
                'leads' => $leads,
            ]);
    }

    public function actionGoods()
    {

        $profile = Profile::find()->where(['id' => Yii::$app->user->id])->one();

        if ($profile->user->getRole() == 'admin') {

            $leads = ClicksLeads::find()->select([
                'product_id',
                'count_lead' => 'COUNT(*)',
                'count_status_unknown' => 'COUNT(CASE WHEN leads_status_id = 1 THEN 1 ELSE NULL END)',
                'count_status_rejected' => 'COUNT(CASE WHEN leads_status_id = 2 THEN 1 ELSE NULL END)',
                'count_status_approved' => 'COUNT(CASE WHEN leads_status_id = 3 THEN 1 ELSE NULL END)',
                'count_status_sold' => 'COUNT(CASE WHEN leads_status_id = 4 THEN 1 ELSE NULL END)',
                'sum_lead_sold_summary' => 'SUM(CASE WHEN leads_status_id = 4 THEN price ELSE 0 END)',
            ])
                ->groupBy('product_id')
                ->all();

        } else {


            $leads = ClicksLeads::find()->select([
                'product_id',
                'count_lead' => 'COUNT(*)',
                'count_status_unknown' => 'COUNT(CASE WHEN leads_status_id = 1 THEN 1 ELSE NULL END)',
                'count_status_rejected' => 'COUNT(CASE WHEN leads_status_id = 2 THEN 1 ELSE NULL END)',
                'count_status_approved' => 'COUNT(CASE WHEN leads_status_id = 3 THEN 1 ELSE NULL END)',
                'count_status_sold' => 'COUNT(CASE WHEN leads_status_id = 4 THEN 1 ELSE NULL END)',
                'sum_lead_sold_summary' => 'SUM(CASE WHEN leads_status_id = 4 THEN price ELSE 0 END)',
            ])
                ->where(['user_id' => Yii::$app->user->id])
                ->groupBy('product_id')
                ->all();


        }

        return $this->render('goods',
            [
                'leads' => $leads,
            ]);

    }

    public function actionDemo()
    {
        $leads = ClicksLeads::getLeadsBySource();
        return $this->render('source',
            [
                'leads' => $leads,
            ]);
    }


    public function actionDate()
    {
        $leads = ClicksLeads::find()->select([
            'DATE(created_at)',
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
                'leads' => $leads,
            ]);
    }


}