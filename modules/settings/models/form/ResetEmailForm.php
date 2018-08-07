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
class ResetEmailForm extends Model
{
    public $email;


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
            'email' => Module::t('settings','Email'),

        ];
    }


    public function __construct($token, $config = [])
    {
        if (empty($token) || !is_string($token)) {
            throw new InvalidParamException(Module::t('settings','Email reset token cannot be blank.'));
        }
        $this->_user = User::findByEmailResetToken($token);
        if (!$this->_user) {
            throw new InvalidParamException(Module::t('settings','Wrong email reset token.'));
        }
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'],'required'],
            ['email', 'string', 'min' => 6],
            [['email'], 'unique', 'targetClass'=>'app\models\User', 'targetAttribute'=>'email', 'message'=>Yii::t('app','This email has been already token.')],
            [['email'], 'email'],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'string', 'max' => 255],
        ];
    }

    /**
     * Resets password.
     *
     * @return boolean if password was reset.
     */
    public function resetEmail()
    {
        $user = $this->_user;
        $user->email = $this->email;
        $user->removeEmailResetToken();

        return $user->save(false);
    }
}