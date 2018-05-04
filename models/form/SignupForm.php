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
use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password_hash;
    public $repeat_password;

    public function rules()
    {
        return [
            [['username','email','password_hash','repeat_password'],'required'],
            [['username'], 'string', 'min'=> 4, 'max'=> 255],
            [['email'], 'unique', 'targetClass'=>'app\models\User', 'targetAttribute'=>'email', 'message'=>"This email has been already token."],
            [['username'], 'unique', 'targetClass'=>'app\models\User', 'targetAttribute'=>'username', 'message'=>"This username has been already token."],
            [['email'], 'email'],
            [['email'], 'trim'],
            ['email', 'string', 'max' => 255],
            ['repeat_password', 'compare', 'compareAttribute'=>'password_hash', 'message'=>"Passwords don't match."],

        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password_hash' => 'Password',
            'repeat_password' => 'Repeat password',
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

                $transaction->commit();
            } else {
                $transaction->rollback();
            }
            return $user->create() ? $user : null;

        }
        return null;

    }



}