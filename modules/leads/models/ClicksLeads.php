<?php

namespace app\modules\leads\models;

use app\modules\product\models\Product;
use app\modules\source\models\MonetizationType;
use app\modules\source\models\Source;
use app\modules\source\models\SourceType;
use Yii;

/**
 * This is the model class for table "clicks_leads".
 *
 * @property integer $id
 * @property string $ip
 * @property string $user_device
 * @property string $user_os
 * @property integer $source_id
 * @property integer $source_type_id
 * @property integer $monetization_type_id
 * @property integer $product_id
 * @property integer $status_id
 * @property integer $price
 * @property integer $isSold
 * @property string $created_at
 * @property integer $isRemoved
 *
 * @property MonetizationType $monetizationType
 * @property Product $product
 * @property Source $source
 * @property SourceType $sourceType
 * @property LeadsStatus $status
 */
class ClicksLeads extends \yii\db\ActiveRecord
{
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
            [['source_id', 'source_type_id', 'monetization_type_id', 'product_id', 'status_id', 'price'], 'integer'],
            [['created_at'], 'safe'],
            [['ip', 'user_device', 'user_os'], 'string', 'max' => 64],
            [['monetization_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => MonetizationType::className(), 'targetAttribute' => ['monetization_type_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['source_id'], 'exist', 'skipOnError' => true, 'targetClass' => Source::className(), 'targetAttribute' => ['source_id' => 'id']],
            [['source_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => SourceType::className(), 'targetAttribute' => ['source_type_id' => 'id']],
            [['leads_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => LeadsStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
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
            'source_id' => 'Source',
            'source_type_id' => 'Source Type',
            'monetization_type_id' => 'Monetization Type',
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
    public function getMonetizationType()
    {
        return $this->hasOne(MonetizationType::className(), ['id' => 'monetization_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSource()
    {
        return $this->hasOne(Source::className(), ['id' => 'source_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSourceType()
    {
        return $this->hasOne(SourceType::className(), ['id' => 'source_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLeadsStatus()
    {
        return $this->hasOne(LeadsStatus::className(), ['id' => 'leads_status_id']);
    }
}
