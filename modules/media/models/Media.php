<?php

namespace app\modules\media\models;

use app\modules\media\Module;
use app\modules\product\models\Product;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "media".
 *
 * @property integer $id
 * @property string $tilte
 * @property string $description
 * @property string $source
 * @property integer $product_id
 * @property integer $media_type_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isRemoved
 *
 * @property MediaType $mediaType
 * @property Product $product
 */
class Media extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'media';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tilte', 'source', 'product_id', 'media_type_id'], 'required'],
            [['product_id', 'media_type_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['tilte', 'description', 'source'], 'string', 'max' => 255],
            [['isRemoved'], 'string', 'max' => 1],
            [
                ['media_type_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => MediaType::className(),
                'targetAttribute' => ['media_type_id' => 'id']
            ],
            [
                ['product_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Product::className(),
                'targetAttribute' => ['product_id' => 'id']
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('media', 'ID'),
            'tilte' => Module::t('media', 'Tilte'),
            'description' => Module::t('media', 'Description'),
            'source' => Module::t('media', 'Source'),
            'product_id' => Module::t('media', 'Product'),
            'media_type_id' => Module::t('media', 'Media Type'),
            'created_at' => Module::t('media', 'Created At'),
            'updated_at' => Module::t('media', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMediaType()
    {
        return $this->hasOne(MediaType::className(), ['id' => 'media_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
