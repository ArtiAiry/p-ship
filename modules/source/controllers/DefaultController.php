<?php

namespace app\modules\source\controllers;

use app\modules\source\models\Source;
use yii\web\Controller;

/**
 * Default controller for the `source` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        $sources = Source::find()->orderBy('id asc')->all();
        return $this->render('index',[
            'sources' => $sources,
        ]);
    }
}
