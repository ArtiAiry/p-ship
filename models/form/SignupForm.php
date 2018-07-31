<?php
/**
 * Created by PhpStorm.
 * User: mint2
 * Date: 27.07.17
 * Time: 16:56
 */

namespace app\models\form;


use app\models\User;
use app\modules\profile\models\Profile;
use app\modules\wallet\models\Wallet;
use Yii;
use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password_hash;
    public $repeat_password;
    public $reCaptcha;
    public $agreement;

    public function rules()
    {
        return [
            [['username','email','password_hash','repeat_password'],'required'],
            [['username'], 'string', 'min'=> 4, 'max'=> 255],
            [['email'], 'unique', 'targetClass'=>'app\models\User', 'targetAttribute'=>'email', 'message'=>Yii::t('app','This email has been already token.')],
            [['username'], 'unique', 'targetClass'=>'app\models\User', 'targetAttribute'=>'username', 'message'=>Yii::t('app','This username has been already token.')],
            [['email'], 'email'],
            [['email'], 'trim'],
            ['email', 'string', 'max' => 255],
            ['repeat_password', 'compare', 'compareAttribute'=>'password_hash', 'message'=>Yii::t('app','Passwords don\'t match.')],
            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6LdAwGYUAAAAAH2Qnxt-1XMODkvI5aaEdmXck4U7', 'uncheckedMessage' => Yii::t('app','Please confirm that you are not a bot.')],
            [['agreement'],'compare',
                'compareValue'=>true,
                'operator'=>'==',
                'when' => function($model){
                    return $model->agreement == 1;
                },
                'message'=>Yii::t('app','You must agree with terms and conditions.')
            ],

        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app','ID'),
            'username' => Yii::t('app','Username'),
            'email' => Yii::t('app','Email'),
            'password_hash' => Yii::t('app','Password'),
            'repeat_password' => Yii::t('app','Repeat Password'),
            'agreement' => Yii::t('app','I accept terms and conditions'),
        ];
    }


    public function signup()
    {
        if($this->validate())
        {
            $user = new User();

            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password_hash);
            $user->generateAuthKey();
            $user->save();

            $profile = new Profile();

            $profile->user_id = $user->id;

            $user->link('profile', $profile);

            $wallet = new Wallet();

            $wallet->user_id = $user->id;

            $user->link('wallet', $wallet);


            $db = \Yii::$app->db;
            $transaction = $db->beginTransaction();
            if ($user->create() && $profile->save()) {

                $userRole = Yii::$app->authManager->getRole('affiliate');
                Yii::$app->authManager->assign($userRole, $user->getId());

                $transaction->commit();
            } else {
                $transaction->rollback();
            }
            return $user->create() ? $user : null;

        }
        return null;

    }



}