<?php

namespace app\fixtures;

use yii\test\ActiveFixture;

class ProductFixture extends ActiveFixture
{
    public $modelClass = 'app\modules\product\models\Product';
    public $dataFile = '@app/fixtures/data/product.php';
}