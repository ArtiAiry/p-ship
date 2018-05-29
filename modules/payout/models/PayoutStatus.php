<?php

namespace app\modules\payout\models;

use Yii;

/**
 * This is the model class for table "payout_status".
 *
 * @property integer $id
 * @property string $name
 * @property integer $isRemoved
 *
 * @property Payout[] $payouts
 */
class PayoutStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payout_status';
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayouts()
    {
        return $this->hasMany(Payout::className(), ['payout_status_id' => 'id']);
    }
}