<?php

namespace app\fixtures;

use yii\test\ActiveFixture;

class PayoutFixture extends ActiveFixture
{
    public $modelClass = 'app\modules\payout\models\Payout';
    public $dataFile = '@app/fixtures/data/payout.php';
}