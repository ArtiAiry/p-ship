<?php

use yii\db\Migration;

/**
 * Handles the creation of table `media_type`.
 */
class m191224_120514_create_media_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%media_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'isRemoved' => "TINYINT (1) default 1",
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%media_type}}');
    }
}
