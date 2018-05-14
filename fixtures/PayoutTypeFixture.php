<?php

namespace app\fixtures;

use yii\test\ActiveFixture;

class PayoutTypeFixture extends ActiveFixture
{
    public $modelClass = 'app\modules\payout\models\PayoutType';
    public $dataFile = '@app/fixtures/data/payout_type.php';
}