<?php

namespace app\modules\wallet\models;

use app\models\User;
use app\modules\payout\models\PayoutType;
use Yii;

/**
 * This is the model class for table "wallet".
 *
 * @property int $id
 * @property int $wallet_type_id
 * @property string $yandex_money
 * @property string $qiwi
 * @property string $webmoney_wmr
 * @property string $paypal_eur
 * @property string $sberbank_rub
 * @property string $pb_uah
 * @property int $user_id
 * @property int $isRemoved
 *
 * @property User $user
 */
class Wallet extends \yii\db\ActiveRecord
{

    const REMOVE = 0;
    const ACTIVE = 1;


    public static function tableName()
    {
        return 'wallet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wallet_type_id', 'user_id', 'isRemoved'], 'integer'],
            [['yandex_money', 'qiwi', 'webmoney_wmr', 'paypal_eur', 'sberbank_rub'], 'string', 'max' => 255],
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
            'wallet_type_id' => 'Main Wallet',
            'yandex_money' => 'Yandex Money',
            'qiwi' => 'Qiwi',
            'webmoney_wmr' => 'Webmoney Wmr',
            'paypal_eur' => 'Paypal Eur',
            'sberbank_rub' => 'Sberbank Rub',
            'pb_uah' => 'Privat UAH',
            'isRemoved' => 'Is Removed',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getWalletType()
    {
        return $this->hasOne(WalletType::className(), ['id' => 'wallet_type_id']);
    }

    public function isRemoved()
    {
        return $this->isRemoved;
    }
    public function remove()
    {
        $this->isRemoved = self::REMOVE;
        return $this->save(false);
    }


}
