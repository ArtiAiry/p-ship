<?php

namespace app\fixtures;

use yii\test\ActiveFixture;

class SourceFixture extends ActiveFixture
{
    public $modelClass = 'app\modules\source\models\Source';
    public $dataFile = '@app/fixtures/data/source.php';
}