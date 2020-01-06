<?php

namespace app\modules\product\controllers;

use app\modules\company\models\Company;
use app\modules\product\models\Product;
use app\modules\profile\models\Profile;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default controller for the `product` module
 */
class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $companies = Company::find()->orderBy('id asc')->all();
        $profile = Profile::findOne(Yii::$app->user->id);

        return $this->render('index',[
            'companies' => $companies,
            'profile' => $profile,
        ]);
    }
}
