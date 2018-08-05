<?php

namespace app\models\form;

use app\modules\profile\models\Profile;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */


    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            [['name'],'string'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            // 'verifyCode' => Yii::t('app','Verification Code'),
            'name' => Yii::t('app','Your Name'),
            'email' => Yii::t('app','Email'),
            'subject' => Yii::t('app','Subject'),
            'body' => Yii::t('app','Text Body'),
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact()
    {

        /* @var $profile Profile */
        if ($this->validate()) {
            Yii::$app->mailer->compose(
                ['html' => 'contactUs-html'],
                [
                    'profile' => $profile,
                    'body' => $this->body,
                    'subject' => $this->subject,
                    'logo'=> 'http://bontip.ru/web/images/mail/partnership_pacifico.png',
                    'message'=> 'http://bontip.ru/web/images/mail/partnership_message.png',
                ]
            )
                ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' бот'])
                ->setTo('altmaster33@gmail.com')
                ->setSubject($this->subject)
                ->send();

            return true;
        }
        return false;
    }
}
