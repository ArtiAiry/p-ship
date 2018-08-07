<?php

namespace app\models;

use app\modules\profile\models\Profile;
use app\modules\wallet\models\Wallet;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $username
 * @property string $auth_key
 * @property string $email_confirm_token
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 *
 *
 **/
class User extends ActiveRecord implements IdentityInterface
{


    const STATUS_BLOCKED = 0;
    const STATUS_WAIT = 5;
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'email'], 'string', 'max' => 255],
            [['password_hash'], 'string', 'max' => 128],
            [['email','username'], 'unique'],

            ['status', 'default', 'value' => self::STATUS_WAIT],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_BLOCKED, self::STATUS_WAIT]],
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app','ID'),
            'username' => Yii::t('app','Username'),
            'email' => Yii::t('app','Email'),
            'password_hash' => Yii::t('app','Password'),
            'created_at' => Yii::t('app','Create Time'),
            'updated_at' => Yii::t('app','Update Time')
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }
        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    //get methods

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    //findBy methods

    public static function findByUsername($username)
    {
        return User::find()->where(['username'=>$username])->one();
    }

    public static function findByEmail($email)
    {
        return User::find()->where(['email'=>$email])->one();
    }

    public static function findByEmailOrUsername($login)
    {
        return User::find()->andWhere(['or', ['username' => $login], ['email' => $login]])->one();
    }

    /**
     * @param string $email_confirm_token
     * @return static|null
     */
    public static function findByEmailConfirmToken($email_confirm_token)
    {
        return static::findOne(['email_confirm_token' => $email_confirm_token, 'status' => self::STATUS_WAIT]);
    }
    /**
     * Generates email confirmation token
     */
    public function generateEmailConfirmToken()
    {
        $this->email_confirm_token = Yii::$app->security->generateRandomString();
    }
    /**
     * Removes email confirmation token
     */
    public function removeEmailConfirmToken()
    {
        $this->email_confirm_token = null;
    }

    public function validatePassword($password_hash)
    {
        if(is_null($this->password_hash))
            return false;
//        return Yii::$app->getSecurity()->validatePassword($this->salt . $password, $this->password);
       return Yii::$app->security->validatePassword($password_hash, $this->password_hash);
    }

    public function setPassword($password_hash)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password_hash);
    }

    public function create()
    {
        return $this->save(false);
    }


    //relations

    public function getProfile()
    {
        return $this->hasMany(Profile::className(), ['user_id' => 'id']);
    }


    public function getWallet()
    {
        return $this->hasMany(Wallet::className(), ['user_id' => 'id']);
    }

    //generate methods

    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function isRemoved()
    {
        return $this->status;
    }

    public function getStatusName()
    {
        if($this->status == self::STATUS_ACTIVE){
            return "<label class='badge badge-success'>" . Yii::t('app','Active') . "</label>";
        }elseif($this->status == self::STATUS_WAIT){
            return "<label class='badge badge-warning'>" . Yii::t('app','Not Confirmed') . "</label>";
        }else{
            return "<label class='badge badge-danger'>" . Yii::t('app','Deleted') . "</label>";
        }
    }

    public function getRole()
    {
        $auth = Yii::$app->authManager;
        $roles = $auth->getRolesByUser($this->id);
        return !empty($roles) ? array_keys($roles)[0] : null;
    }

    public function getRoleName()
    {
        $roles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId());
        foreach ($roles as $role){
            echo $role->description;
        }
    }

}
