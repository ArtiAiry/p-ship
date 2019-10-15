<?php
namespace app\models\form;

use app\models\User;
use Yii;
use yii\base\Model;


/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => 'app\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => Yii::t('app','There is no user with such email.')
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if (!$user) {
            return false;
        }
        
        if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
        }
        
        if (!$user->save()) {
            return false;
        }

        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
                [
                    'user' => $user,
                    'logo' => 'http://app.profituz.com/web/images/mail/logo-white.png',
                ]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => 'Команда ' . Yii::$app->name])
            ->setTo($this->email)
            ->setSubject('Сброс пароля для партнерской сети ' . Yii::$app->name)
            ->send();
    }
}
