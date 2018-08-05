<?php

namespace app\modules\wallet\models;

use app\modules\wallet\Module;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "wallet_type".
 *
 * @property integer $id
 * @property string $name
 * @property integer $isRemoved
 */
class WalletType extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wallet_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('type','ID'),
            'name' => Module::t('type','Wallet Type\'s Name'),
        ];
    }
}
