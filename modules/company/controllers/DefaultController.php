<?php

namespace app\modules\company\controllers;

use app\modules\company\models\Company;
use app\modules\company\models\CompanySearch;
use app\modules\profile\models\Profile;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default controller for the `company` module
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
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['admin'],
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
        $profile = Profile::findOne(Yii::$app->user->id);
        $companies = Company::find()->orderBy('id asc')->all();
        return $this->render('index',[
            'companies' => $companies,
            'profile' => $profile,
        ]);
    }
}
