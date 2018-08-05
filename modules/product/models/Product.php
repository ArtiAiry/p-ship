<?php

namespace app\modules\product\models;

use app\modules\product\Module;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $price
 * @property string $banner_url
 * @property string $logo_url
 * @property string $created_at
 */
class Product extends ActiveRecord
{

    const REMOVE = 0;


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
            [['price'], 'integer'],
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
            'id' => Module::t('product','ID'),
            'name' => Module::t('product','Product\'s Name'),
            'description' => Module::t('product','Description'),
            'price' => Module::t('product','Price'),
            'banner_url' => Module::t('product','Banner\'s Url'),
            'logo_url' => Module::t('product','Logo\'s Url'),
            'created_at' => Module::t('product','Created At'),
        ];
    }

    public function removePayout()
    {
        $this->isRemoved = self::REMOVE;

        return $this->save(false);

    }

    public function isRemoved()
    {
        return $this->isRemoved;
    }

}
