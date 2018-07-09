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

        $manageAffiliates = $auth->createPermission('manageSources');
        $manageAffiliates->description = 'Manage sources';
        $auth->add($manageAffiliates);


        $affiliate = $auth->createRole('affiliate');
        $affiliate->description = 'Affiliate';
        $auth->add($affiliate);

        $auth->addChild($affiliate, $manageAffiliates);
        $admin = $auth->createRole('admin');
        $admin->description = 'Administrator';
        $auth->add($admin);

        $auth->addChild($admin, $affiliate);
        $auth->addChild($admin, $manageAffiliates);
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