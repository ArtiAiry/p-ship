<?php

namespace app\fixtures;

use yii\test\ActiveFixture;

class ProfileFixture extends ActiveFixture
{
    public $modelClass = 'app\modules\profile\models\Profile';
    public $dataFile = '@app/fixtures/data/profile.php';
}