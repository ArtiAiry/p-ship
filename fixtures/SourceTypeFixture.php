<?php

namespace app\fixtures;

use yii\test\ActiveFixture;

class SourceTypeFixture extends ActiveFixture
{
    public $modelClass = 'app\modules\source\models\SourceType';
    public $dataFile = '@app/fixtures/data/source_type.php';
}