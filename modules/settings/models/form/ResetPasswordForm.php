<?php
namespace app\modules\settings\models\form;

use app\modules\settings\Module;
use Yii;
use yii\base\Model;
use yii\base\InvalidParamException;
use app\models\User;

/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $repeat_password;
    public $password;


    /**
     * @var User
     */
    private $_user;


    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function attributeLabels()
    {
        return [
            // 'verifyCode' => Yii::t('app','Verification Code'),
            'password' => Module::t('settings','Password'),
            'repeat_password' => Module::t('settings','Repeat Password'),

        ];
    }


    public function __construct($token, $config = [])
    {
        if (empty($token) || !is_string($token)) {
            throw new InvalidParamException(Module::t('settings','Password reset token cannot be blank.'));
        }
        $this->_user = User::findByPasswordResetToken($token);
        if (!$this->_user) {
            throw new InvalidParamException(Module::t('settings','Wrong password reset token.'));
        }
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password', 'repeat_password'],'required'],
            ['password', 'string', 'min' => 6],
            ['repeat_password', 'compare', 'compareAttribute'=>'password', 'message'=>Module::t('settings','Passwords don\'t match.')],
        ];
    }

    /**
     * Resets password.
     *
     * @return boolean if password was reset.
     */
    public function resetPassword()
    {
        $user = $this->_user;
        $user->setPassword($this->password);
        $user->removePasswordResetToken();

        return $user->save(false);
    }
}