<?php

namespace app\modules\leads\models;

use app\models\User;
use app\modules\leads\Module;
use app\modules\product\models\Product;
use app\modules\profile\models\Profile;
use Codeception\Module\Cli;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;


/**
 * This is the model class for table "clicks_leads".
 *
 * @property integer $id
 * @property string $ip
 * @property string $user_device
 * @property string $user_os
 * @property integer $source
 * @property integer $product_id
 * @property integer $user_id
 * @property integer $leads_status_id
 * @property integer $price
 * @property integer $isSold
 * @property string $created_at
 * @property integer $isRemoved
 *
 * @property Product $product
 * @property LeadsStatus $status
 */
class ClicksLeads extends ActiveRecord
{
    const REMOVE = 0;

    public $count_lead;
    public $leadsService;
    public $count_status_unknown;
    public $count_status_rejected;
    public $count_status_approved;
    public $count_status_sold;
    public $sum_lead_sold_summary;
    public $date;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clicks_leads';
    }

    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
            [['product_id', 'leads_status_id', 'price', 'user_id'], 'integer'],
            [['created_at', 'date'], 'safe'],
            [['count_lead', 'count_status_unknown', 'count_status_rejected', 'count_status_approved', 'count_status_sold', 'sum_lead_sold_summary'], 'integer'],
            [['ip', 'user_device', 'user_os', 'source'], 'string', 'max' => 64],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['leads_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => LeadsStatus::className(), 'targetAttribute' => ['leads_status_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('leads', 'ID'),
            'ip' => Module::t('leads', 'Ip'),
            'user_device' => Module::t('leads', 'User Device'),
            'user_os' => Module::t('leads', 'User OS'),
            'user_id' => Module::t('leads', 'Affiliate'),
            'product_id' => Module::t('leads', 'Product'),
            'leads_status_id' => Module::t('leads', 'Status'),
            'price' => Module::t('leads', 'Price'),
            'source' => Module::t('leads', 'Source'),
            'isSold' => Module::t('leads', 'Is Sold'),
            'created_at' => Module::t('leads', 'Created At'),
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public function getLeadsStatus()
    {
        return $this->hasOne(LeadsStatus::className(), ['id' => 'leads_status_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getCountSource()
    {
        $query = (new Query())->from('clicks_leads')->groupBy('source');
        $count = $query->count();
        echo $count;
    }

    public function getCountStatus()
    {
        $query = ClicksLeads::find()->select('leads_status_id')->from('clicks_leads')->all();

        echo $query;
    }

    public function removeLead()
    {
        $this->isRemoved = self::REMOVE;

        return $this->save(false);

    }

    public function isRemoved()
    {
        return $this->isRemoved;
    }

    public function getTotalLeadSummary($id)
    {
        $query = (new Query())
            ->from('clicks_leads')
            ->where([
                'clicks_leads.user_id'=>$id,
                'clicks_leads.leads_status_id'=>4,
                'clicks_leads.isRemoved'=> 1
            ]);
        $sum = $query->sum('price');

        if($sum == 0){
            echo 0;
        }else{
            echo $sum;
        }
    }

    public static function getLeadsCountDemo()
    {

        return self::find()->select(['*',
            'count_lead' => 'COUNT(*)',
            'count_status_unknown' => 'COUNT(CASE WHEN leads_status_id = 1 THEN 1 ELSE NULL END)',
            'count_status_rejected' => 'COUNT(CASE WHEN leads_status_id = 2 THEN 1 ELSE NULL END)',
            'count_status_approved' => 'COUNT(CASE WHEN leads_status_id = 3 THEN 1 ELSE NULL END)',
            'count_status_sold' => 'COUNT(CASE WHEN leads_status_id = 4 THEN 1 ELSE NULL END)',
            'sum_lead_sold_summary' => 'SUM(CASE WHEN leads_status_id = 4 THEN price ELSE 0 END)',
        ])->groupBy('source')->all();
    }


    public static function getLeadsBySource()
    {

        $profile = Profile::find()->where(['id' => Yii::$app->user->id])->one();

        if ($profile->user->getRole() == 'admin') {

            return self::find()->select([
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
            return self::find()->select([
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
    }

    public static function getLeadsByProducts()
    {

        $profile = Profile::find()->where(['id' => Yii::$app->user->id])->one();

        if ($profile->user->getRole() == 'admin') {

            return self::find()->select([
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


            return self::find()->select([
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
    }


    public static function getLeadsByDate()
    {

        $profile = Profile::find()->where(['id' => Yii::$app->user->id])->one();

        if ($profile->user->getRole() == 'admin') {

            return self::find()->select([
                'DATE(created_at)',
                'count_lead' => 'COUNT(*)',
                'count_status_unknown' => 'COUNT(CASE WHEN leads_status_id = 1 THEN 1 ELSE NULL END)',
                'count_status_rejected' => 'COUNT(CASE WHEN leads_status_id = 2 THEN 1 ELSE NULL END)',
                'count_status_approved' => 'COUNT(CASE WHEN leads_status_id = 3 THEN 1 ELSE NULL END)',
                'count_status_sold' => 'COUNT(CASE WHEN leads_status_id = 4 THEN 1 ELSE NULL END)',
                'sum_lead_sold_summary' => 'SUM(CASE WHEN leads_status_id = 4 THEN price ELSE 0 END)',
                'date' => 'DATE(created_at)',
            ])
                ->groupBy('DATE(created_at)')
                ->all();

        } else {


            return self::find()->select([
                'DATE(created_at)',
                'count_lead' => 'COUNT(*)',
                'count_status_unknown' => 'COUNT(CASE WHEN leads_status_id = 1 THEN 1 ELSE NULL END)',
                'count_status_rejected' => 'COUNT(CASE WHEN leads_status_id = 2 THEN 1 ELSE NULL END)',
                'count_status_approved' => 'COUNT(CASE WHEN leads_status_id = 3 THEN 1 ELSE NULL END)',
                'count_status_sold' => 'COUNT(CASE WHEN leads_status_id = 4 THEN 1 ELSE NULL END)',
                'sum_lead_sold_summary' => 'SUM(CASE WHEN leads_status_id = 4 THEN price ELSE 0 END)',
                'date' => 'DATE(created_at)',
            ])
                ->where(['user_id' => Yii::$app->user->id])
                ->groupBy('DATE(created_at)')
                ->all();

        }


    }

//    public function getLeadSummary()
//    {
//        $query = (new Query())->from('clicks_leads')->join('LEFT JOIN', 'source', 'clicks_leads.id = source.id')->where(['source.user_id'=>Yii::$app->user->id, 'clicks_leads.isSold'=>1]);
//        $sum = $query->sum('price');
//        echo $sum;
////        $query->join('LEFT JOIN', 'post', 'post.user_id = user.id');
//    }






}
