<?php

namespace app\modules\sandbox\controllers;

use app\modules\company\models\Company;
use yii\web\Controller;

/**
 * Default controller for the `sandbox` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $companies = Company::find()->orderBy('id asc')->all();
        return $this->render('index',[
            'companies' => $companies,
        ]);
    }
}
