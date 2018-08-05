<?php

namespace app\fixtures;

use yii\test\ActiveFixture;

class ClicksLeadsFixture extends ActiveFixture
{
    public $modelClass = 'app\modules\leads\models\ClicksLeads';
    public $dataFile = '@app/fixtures/data/clicks_leads.php';
}