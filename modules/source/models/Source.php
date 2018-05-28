<?php

namespace app\modules\source\models;

use app\models\User;
use app\modules\product\models\Product;
use Yii;

/**
 * This is the model class for table "source".
 *
 * @property integer $id
 * @property string $name
 * @property integer $source_type_id
 * @property integer $user_id
 * @property integer $product_id
 * @property integer $monetization_type_id
 * @property integer $source_status_id
 * @property string $created_at
 *
 * @property MonetizationType $monetizationType
 * @property Product $product
 * @property SourceType $sourceType
 * @property User $user
 */
class Source extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'source';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['source_type_id', 'user_id', 'product_id', 'monetization_type_id', 'status'], 'integer'],
            [['user_id'], 'required'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['monetization_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => MonetizationType::className(), 'targetAttribute' => ['monetization_type_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['source_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['source_status_id' => 'id']],
            [['source_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => SourceType::className(), 'targetAttribute' => ['source_type_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'source_type_id' => 'Source Type',
            'user_id' => 'User',
            'product_id' => 'Product',
            'monetization_type_id' => 'Monetization Type',
            'source_status_id' => 'Status',
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
    public function getSourceType()
    {
        return $this->hasOne(SourceType::className(), ['id' => 'source_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getSourceStatus()
    {
        return $this->hasOne(SourceStatus::className(), ['id' => 'source_status_id']);
    }
}
