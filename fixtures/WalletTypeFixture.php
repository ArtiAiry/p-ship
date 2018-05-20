<?php

namespace app\fixtures;

use yii\test\ActiveFixture;

class WalletTypeFixture extends ActiveFixture
{
    public $modelClass = 'app\modules\wallet\models\WalletType';
    public $dataFile = '@app/fixtures/data/wallet_type.php';
}