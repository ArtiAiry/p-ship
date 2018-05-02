<?php

namespace app\modules\wallet\models;

use app\models\User;
use Yii;

/**
 * This is the model class for table "wallet".
 *
 * @property int $id
 * @property int $payout_type_id
 * @property string $yandex_money
 * @property string $qiwi
 * @property string $webmoney_wmr
 * @property string $paypal_eur
 * @property string $sberbank_rub
 * @property int $user_id
 * @property int $isMain
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
            [['payout_type_id', 'user_id', 'isMain', 'isRemoved'], 'integer'],
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
            'payout_type_id' => 'Payout Type ID',
            'yandex_money' => 'Yandex Money',
            'qiwi' => 'Qiwi',
            'webmoney_wmr' => 'Webmoney Wmr',
            'paypal_eur' => 'Paypal Eur',
            'sberbank_rub' => 'Sberbank Rub',
            'user_id' => 'User ID',
            'isMain' => 'Is Main',
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


    public function isRemoved()
    {
        return $this->isRemoved;
    }
    public function remove()
    {
        $this->isRemoved = self::REMOVE;
        return $this->save(false);
    }
    public function isActive()
    {
        return $this->isActive;
    }
    public function activate()
    {
        $this->isActive = self::ACTIVE;
        return $this->save(false);
    }
    public function disactivate()
    {
        $this->isActive = self::REMOVE;
        return $this->save(false);
    }

}
