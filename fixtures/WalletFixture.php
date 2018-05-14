<?php

namespace app\fixtures;

use yii\test\ActiveFixture;

class WalletFixture extends ActiveFixture
{
    public $modelClass = 'app\modules\wallet\models\Wallet';
    public $dataFile = '@app/fixtures/data/wallet.php';
}