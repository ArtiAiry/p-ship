<?php
namespace app\models\form;
use app\models\User;
use Yii;
use yii\base\Model;
/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $login;
    public $email;
    public $username;
    public $password_hash;
    public $rememberMe = true;
    private $_user = false;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // email and password are both required
            [['login', 'password_hash'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password_hash', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'login' => Yii::t('app','Login'),
            'password_hash' =>  Yii::t('app','Password'),
            'rememberMe'=> Yii::t('app','Remember me'),

        ];
    }
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
    */

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password_hash)) {
                $this->addError($attribute, Yii::t('app','Incorrect username or password.'));
            } elseif ($user && $user->status == User::STATUS_BLOCKED) {
                $this->addError($attribute, Yii::t('app','Your account has been suspended.'));
            } elseif ($user && $user->status == User::STATUS_WAIT) {
                $this->addError($attribute, Yii::t('app','Your account is not confirmed.'));
            }
        }
    }
    /**
     * Logs in a user using the provided email and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }
    /**
     * Finds user by [[both email and username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByEmailOrUsername($this->login);
        }
        return $this->_user;
    }
}