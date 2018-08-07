<?php

namespace app\modules\wallet\models;

use app\models\User;
use app\modules\payout\models\PayoutType;
use app\modules\wallet\Module;
use Yii;
use yii\db\ActiveRecord;

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
class Wallet extends ActiveRecord
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
            [['wallet_type_id', 'user_id'], 'integer'],
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
            'id' => Module::t('wallet','ID'),
            'wallet_type_id' => Module::t('wallet','Main Wallet'),
            'yandex_money' => Module::t('wallet','Yandex Money'),
            'qiwi' => Module::t('wallet','Qiwi'),
            'webmoney_wmr' =>  Module::t('wallet','Webmoney Wmr'),
            'paypal_eur' =>  Module::t('wallet','Paypal Eur'),
            'sberbank_rub' => Module::t('wallet','Sberbank Rub'),
            'pb_uah' => Module::t('wallet','Privat UAH'),
            'user_id' => Module::t('wallet','Username'),
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
    public function removeWallet()
    {
        $this->isRemoved = self::REMOVE;
        return $this->save(false);
    }

    public function getMainWallet() {

        if ($this->wallet_type_id == 1){
            return '<span class="badge badge-warning" data-toggle="tooltip" data-placement="bottom"  title="Реквизиты: ' . $this->yandex_money  .   '">' . $this->walletType->name .  "</span>";
        } elseif ($this->wallet_type_id == 2){
            return '<span class="badge badge-success" data-toggle="tooltip" data-placement="bottom"  title="Реквизиты: ' . $this->qiwi . '">' . $this->walletType->name . "</span>";
        } elseif ($this->wallet_type_id == 3){
            return '<span class="badge badge-pill badge-dark" data-toggle="tooltip" data-placement="bottom"  title="Реквизиты: ' . $this->webmoney_wmr . '">' . $this->walletType->name . '</span>';
        } elseif ($this->wallet_type_id == 4){
            return '<span class="badge badge-primary" data-toggle="tooltip" data-placement="bottom"  title="Реквизиты: ' . $this->paypal_eur . '">' . $this->walletType->name . '</span>';
        } elseif ($this->wallet_type_id == 5){
            return '<span class="badge badge-info" data-toggle="tooltip" data-placement="bottom"  title="Реквизиты: ' . $this->sberbank_rub . '">' . $this->walletType->name . '</span>';
        } elseif ($this->wallet_type_id == 6) {
            return '<span class="badge badge-success" data-toggle="tooltip" data-placement="bottom"  title="Реквизиты: ' . $this->pb_uah . '">' . $this->walletType->name . '</span>';
        } elseif ($this->wallet_type_id == null) {
            return '<span class="badge badge-danger" data-toggle="tooltip" data-placement="bottom"  title="Для того, чтобы указать приоритетный кошелек для выплат, нужно зайти в настройки кошелька."' . '">' . '<i class="mdi mdi-information mr-1" aria-hidden="true"></i>' ."Не указан" . '</span>';
        }

    }

}

//Для того, чтобы поставить приоритетный кошелек, нужно зайти в настройки кошелька.