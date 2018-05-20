<?php

use yii\db\Migration;

/**
 * Handles the creation of table `monetization_type`.
 */
class m180517_130725_create_monetization_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%monetization_type}}', [
            'id' => 'pk',
            'name' => $this->string(255)->notNull(),
            'isRemoved' => "TINYINT (1) default 1",
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%monetization_type}}');
    }
}
