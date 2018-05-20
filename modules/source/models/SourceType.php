<?php

namespace app\modules\source\models;

use Yii;

/**
 * This is the model class for table "source_type".
 *
 * @property integer $id
 * @property string $name
 * @property integer $isRemoved
 */
class SourceType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'source_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'],'required'],
            [['name'], 'string', 'max' => 255],
            [['isRemoved'], 'string', 'max' => 1],
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
