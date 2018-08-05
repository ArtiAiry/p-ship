<?php

namespace app\fixtures;

use yii\test\ActiveFixture;

class LeadsStatusFixture extends ActiveFixture
{
    public $modelClass = 'app\modules\leads\models\LeadsStatus';
    public $dataFile = '@app/fixtures/data/leads_status.php';
}