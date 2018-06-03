<?php

namespace app\modules\leads\models;

use app\models\User;
use app\modules\product\models\Product;
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
class ClicksLeads extends \yii\db\ActiveRecord
{

    public $count;

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
            [['created_at'], 'safe'],
            [['count'], 'integer'],
            [['ip', 'user_device', 'user_os', 'source'], 'string', 'max' => 64],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['leads_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => LeadsStatus::className(), 'targetAttribute' => ['leads_status_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'Ip',
            'user_device' => 'User Device',
            'user_os' => 'User Os',
            'user_id' => 'User',
            'product_id' => 'Product',
            'leads_status_id' => 'Status',
            'price' => 'Price',
            'isSold' => 'Is Sold',
            'created_at' => 'Created At',
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
//    public function getLeadSummary()
//    {
//        $query = (new Query())->from('clicks_leads')->join('LEFT JOIN', 'source', 'clicks_leads.id = source.id')->where(['source.user_id'=>Yii::$app->user->id, 'clicks_leads.isSold'=>1]);
//        $sum = $query->sum('price');
//        echo $sum;
////        $query->join('LEFT JOIN', 'post', 'post.user_id = user.id');
//    }

}
