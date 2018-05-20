<?php

namespace app\fixtures;

use yii\test\ActiveFixture;

class MonetizationTypeFixture extends ActiveFixture
{
    public $modelClass = 'app\modules\source\models\MonetizationType';
    public $dataFile = '@app/fixtures/data/monetization_type.php';
}