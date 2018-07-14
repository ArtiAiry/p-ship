<?php

namespace app\modules\product\controllers;

use app\modules\product\models\Product;
use app\modules\profile\models\Profile;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `product` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        $products = Product::find()->orderBy('id asc')->all();
        $profile = Profile::findOne(Yii::$app->user->id);

        return $this->render('index',[
            'products' => $products,
            'profile' => $profile,
        ]);
    }
}
