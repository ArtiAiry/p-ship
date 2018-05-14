<?php

namespace app\modules\payout\models;

use Yii;

/**
 * This is the model class for table "payout_type".
 *
 * @property integer $id
 * @property string $name
 * @property integer $isRemoved
 *
 * @property Wallet[] $wallets
 */
class PayoutType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payout_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 128],
            [['isRemoved'], 'string', 'max' => 1],
            [['name'], 'unique'],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWallets()
    {
        return $this->hasMany(Wallet::className(), ['payout_type_id' => 'id']);
    }
}
