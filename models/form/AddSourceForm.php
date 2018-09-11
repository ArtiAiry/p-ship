<?php
/**
 * Created by PhpStorm.
 * User: Diwork
 * Date: 22.05.2018
 * Time: 18:30
 */

namespace app\models\form;


use app\modules\source\models\Source;
use Yii;
use yii\base\Model;

class AddSourceForm extends Model
{
    public $name;
    public $product_id;
    public $source_type_id;
    public $monetization_type_id;
    public $user_id;
    public $status;


    public function rules()
    {
        return [
            ['name', 'string', 'max' => 255],
            [['source_type_id', 'monetization_type_id'],'required'],
            [['user_id'], 'integer'],
        ];
    }
    public function add_source()
    {
        if($this->validate())
        {
            $source = new Source();
            $source->name = $this->name;
            $source->source_type_id = $this->source_type_id;
            $source->monetization_type_id = $this->monetization_type_id;
            $source->user_id = Yii::$app->user->id;
            $source->status = 1;
            return $source->save() ? $source : null;
        }
    }
}