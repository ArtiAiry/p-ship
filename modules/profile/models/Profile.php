<?php

namespace app\modules\profile\models;

use app\models\User;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $skype
 * @property string $phone
 * @property string $telegram
 * @property string $whatsapp
 * @property int $isRemoved
 *
 * @property User $user
 */
class Profile extends ActiveRecord
{

    const REMOVE = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'isRemoved'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 64],
            [['skype', 'telegram', 'whatsapp'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 24],
            [['skype'], 'unique'],
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
            'user_id' => 'User ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'skype' => 'Skype',
            'phone' => 'Phone',
            'telegram' => 'Telegram',
            'whatsapp' => 'Whatsapp',
            'isRemoved' => 'Is Removed',
        ];
    }

    public function profileRegister()

    {
        if($this->validate())
        {
            $user = new User();

            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->save();

            $profile = new Profile();

            $profile->user_id = $user->id;
            $profile->first_name = $this->first_name;
            $profile->last_name = $this->last_name;
            $profile->skype = $this->skype;
            $profile->phone = $this->phone;
            $profile->telegram = $this->telegram;
            $profile->whatsapp = $this->whatsapp;

            $user->link('profile', $profile);

            $db = \Yii::$app->db;
            $transaction = $db->beginTransaction();
            if ($user->create() && $profile->save()) {

                $transaction->commit();
            } else {
                $transaction->rollback();
            }
            return $user->create() ? $user : null;

        }
        return null;
    }


    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function removeProfile()
    {
        $this->isRemoved = self::REMOVE;
        $this->user->status = self::REMOVE;
        return $this->save(false);
    }
}
