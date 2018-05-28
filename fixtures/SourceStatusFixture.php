<?php

namespace app\fixtures;

use yii\test\ActiveFixture;

class SourceStatusFixture extends ActiveFixture
{
    public $modelClass = 'app\modules\source\models\SourceStatus';
    public $dataFile = '@app/fixtures/data/source_status.php';
}