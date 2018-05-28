<?php

namespace app\modules\wallet\models;

use Yii;

/**
 * This is the model class for table "wallet_type".
 *
 * @property integer $id
 * @property string $name
 * @property integer $isRemoved
 */
class WalletType extends \yii\db\ActiveRecord
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
            'id' => 'ID',
            'name' => 'Name',
            'isRemoved' => 'Is Removed',
        ];
    }
}
