<?php

namespace app\modules\product\controllers;

use app\modules\product\models\Product;
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
        return $this->render('index',[
            'products' => $products,
        ]);
    }
}
