<?php

namespace app\modules\media\models;

use app\modules\media\Module;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "media_type".
 *
 * @property integer $id
 * @property string $name
 * @property integer $isRemoved
 *
 * @property Media[] $media
 */
class MediaType extends ActiveRecord
{
    const REMOVE = 0;

    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'media_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
            'id' => Module::t('type', 'ID'),
            'name' => Module::t('type', 'Media\'s Type Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getMedia()
    {
        return $this->hasMany(Media::className(), ['media_type_id' => 'id']);
    }

    public function removeMediaType()
    {
        $this->isRemoved = self::REMOVE;

        return $this->save(false);

    }

    public function isRemoved()
    {
        return $this->isRemoved;
    }

}
