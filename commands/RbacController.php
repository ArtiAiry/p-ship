<?php

namespace app\commands;
use app\models\User;
use Yii;
use yii\base\InvalidParamException;
use yii\console\Controller;

class RbacController extends Controller

{

    public function actionInit()

    {

        if (!$this->confirm("Are you sure? It will re-create permissions tree.")) {
            return self::EXIT_CODE_NORMAL;
        }

        $auth = Yii::$app->authManager;


        $addPayouts = $auth->createPermission('managePayouts');
        $addPayouts->description = 'Manage payouts';
        $auth->add($addPayouts);

        $addProducts = $auth->createPermission('manageProducts');
        $addProducts->description = 'Manage products';
        $auth->add($addProducts);


        $affiliate = $auth->createRole('affiliate');
        $affiliate->description = 'Affiliate';
        $auth->add($affiliate);

        $admin = $auth->createRole('admin');
        $admin->description = 'Administrator';
        $auth->add($admin);

        $auth->addChild($admin, $affiliate);
        $auth->addChild($admin, $addProducts);
        $auth->addChild($admin, $addPayouts);
    }
    public function actionAssign($role, $username)
    {
        $user = User::find()->where(['username' => $username])->one();
        if (!$user) {
            throw new InvalidParamException("There is no user \"$username\".");
        }
        $auth = Yii::$app->authManager;
        $roleObject = $auth->getRole($role);
        if (!$roleObject) {
            throw new InvalidParamException("There is no role \"$role\".");
        }
        $auth->assign($roleObject, $user->id);
    }
}