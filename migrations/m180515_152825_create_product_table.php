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
            'description' => $this->string(255),
            'price' => $this->integer(),
            'banner_url'=> $this->string(255),
            'site_url'=> $this->string(255),
            'logo_url' => $this->string(255),
            'created_at' => "timestamp NOT NULL DEFAULT current_timestamp",
            'isRemoved'=> "TINYINT (1) default 1",
        ]);
    }


    public function down()
    {
        $this->dropTable('{{%product}}');
    }

}
