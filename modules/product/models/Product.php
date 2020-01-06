<?php

namespace app\modules\product\models;

use app\modules\company\models\Company;
use app\modules\product\Module;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $name
 * @property string $description
 * @property integer $price
 * @property string $banner_url
 * @property string $site_url
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
            [['price','company_id'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'banner_url', 'logo_url', 'site_url' ,'description'], 'string', 'max' => 255],
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
            'company_id' => Module::t('product','Company'),
            'banner_url' => Module::t('product','Banner\'s Url'),
            'site_url' => Module::t('product','Site\'s Url'),
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

    public function getBuildUrl()
    {
        return $this->site_url . "/?aff=" . Yii::$app->user->id . "&p=" . $this->id;
    }

    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
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

    public static function getCompanyProducts($name)
    {
        return Product::find()
            ->orderBy('id asc')
            ->join('LEFT JOIN', 'company', 'product.company_id = company.id')
//                ->where(['product.company_id'=>$id])
            ->where(['company.name'=>$name])
            ->all();
    }

}
