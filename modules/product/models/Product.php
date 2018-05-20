<?php

namespace app\modules\product\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $cpl_price
 * @property integer $cps_price
 * @property string $banner_url
 * @property string $logo_url
 * @property string $created_at
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cpl_price', 'cps_price'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'banner_url', 'logo_url', 'description'], 'string', 'max' => 255],
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
            'description' => 'Description',
            'cpl_price' => 'Cpl Price',
            'cps_price' => 'Cps Price',
            'banner_url' => 'Banner Url',
            'logo_url' => 'Logo Url',
            'created_at' => 'Created At',
        ];
    }
}
