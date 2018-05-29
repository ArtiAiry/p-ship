<?php

namespace app\modules\leads\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property integer $id
 * @property string $name
 * @property integer $isRemoved
 *
 * @property ClicksLeads[] $clicksLeads
 */
class LeadsStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'leads_status';
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
            'isRemoved' => '',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClicksLeads()
    {
        return $this->hasMany(ClicksLeads::className(), ['leads_status_id' => 'id']);
    }
}