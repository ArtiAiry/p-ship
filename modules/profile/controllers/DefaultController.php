<?php

namespace app\modules\profile\controllers;

use app\modules\profile\models\Profile;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Profile models.
     * @return mixed
     */
    public function actionIndex()
    {

        $profiles = Profile::find()->orderBy('id asc')->all();
        return $this->render('index', [
            'profiles' => $profiles,
        ]);
    }
}
