<?php

namespace app\modules\payout\models;

use app\models\User;
use app\modules\wallet\models\WalletType;
use Yii;
use yii\db\Query;

/**
 * This is the model class for table "payout".
 *
 * @property integer $id
 * @property integer $wallet_type_id
 * @property integer $user_id
 * @property integer $payout_sum
 * @property integer $payout_currency
 * @property integer $payout_sum_rub
 * @property integer $payout_status_id
 * @property string $comment
 * @property string $created_at
 * @property integer $isRemoved
 *
 * @property PayoutStatus $payoutStatus
 * @property User $user
 * @property WalletType $walletType
 */
class Payout extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payout';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wallet_type_id', 'user_id'], 'required'],
            [['wallet_type_id', 'user_id', 'payout_sum', 'payout_currency', 'payout_sum_rub', 'payout_status_id'], 'integer'],
            [['created_at'], 'safe'],
            [['comment'], 'string', 'max' => 255],
            [['payout_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => PayoutStatus::className(), 'targetAttribute' => ['payout_status_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['wallet_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => WalletType::className(), 'targetAttribute' => ['wallet_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'wallet_type_id' => 'Wallet Type',
            'user_id' => 'User',
            'payout_sum' => 'Payout Summary',
            'payout_currency' => 'Payout Currency',
            'payout_sum_rub' => 'Payout Summary (RUB)',
            'payout_status_id' => 'Payout Status',
            'comment' => 'Comment',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayoutStatus()
    {
        return $this->hasOne(PayoutStatus::className(), ['id' => 'payout_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWalletType()
    {
        return $this->hasOne(WalletType::className(), ['id' => 'wallet_type_id']);
    }


    public function getSuccessPayoutSummary() {

        $query = (new Query())->from('payout')->where(['user_id'=>Yii::$app->user->id, 'payout_status_id'=>1]);
        $sum = $query->sum('payout_sum_rub');
        echo $sum;
    }

    public function getTotalPayoutSummary() {

        $query = (new \yii\db\Query())->from('payout')->where(['user_id'=>Yii::$app->user->id]);
        $sum = $query->sum('payout_sum_rub');
        echo $sum;
    }

    public function getCurrencyList ()
    {
        return [
            0=>'Not Set',
            1=>'RUB',
            2=>'USD',
            3=>'UAH',
            4=>'EUR',
        ];
    }

    public function getCurrencyName()
    {

        if ($this->payout_currency == 1){
            return 'RUB';
        } elseif ($this->payout_currency == 2){
            return 'USD';
        } elseif ($this->payout_currency == 3){
            return 'UAH';
        } elseif ($this->payout_currency == 4){
            return 'EUR';
        } else {
            return 'Not Set';
        }
    }
}
