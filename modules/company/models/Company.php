<?php

namespace app\modules\company\models;

use app\modules\company\Module;
use app\modules\product\models\Product;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;

/**
 * This is the model class for table "company".
 *
 * @property integer $id
 * @property string $name
 * @property string $info
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isRemoved
 *
 * @property Product[] $products
 */
class Company extends ActiveRecord
{

    const REMOVE = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['info'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('company', 'ID'),
            'name' => Module::t('company', 'Name'),
            'info' => Module::t('company', 'Info'),
            'created_at' => Module::t('company', 'Created At'),
            'updated_at' => Module::t('company', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['company_id' => 'id']);
    }

    public function removeCompany()
    {
        $this->isRemoved = self::REMOVE;

        return $this->save(false);

    }

    public function isRemoved()
    {
        return $this->isRemoved;
    }

    public function getCompanyProductsCount($id)
    {
        $query = (new Query())
            ->from('product')
            ->where([
                'product.company_id'=>$id,

            ]);
        $count = $query->count('product.company_id');

        if($count == 0){
            echo 0;
        }else{
            echo $count;
        }
    }
}
