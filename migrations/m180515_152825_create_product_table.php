<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m180515_152825_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%product}}', [
            'id' => 'pk',
            'name' => $this->string(255),
            'cpl_price' => $this->integer(),
            'cps_price' => $this->integer(),
            'banner_url'=> $this->string(255),
            'logo_url' => $this->string(255),
            'created_at'=>"timestamp NOT NULL DEFAULT current_timestamp"
        ]);
    }


    public function down()
    {
        $this->dropTable('{{%product}}');
    }

}
