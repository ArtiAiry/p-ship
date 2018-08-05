<?php

namespace app\fixtures;

use yii\test\ActiveFixture;

class PayoutStatusFixture extends ActiveFixture
{
    public $modelClass = 'app\modules\payout\models\PayoutStatus';
    public $dataFile = '@app/fixtures/data/payout_status.php';
}