<?php

use yii\db\Migration;

/**
 * Handles the creation of table `source_type`.
 */
class m180517_130747_create_source_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%source_type}}', [
            'id' => 'pk',
            'name' => $this->string(255)->notNull(),
            'isRemoved' => "TINYINT (1) default 1",
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%source_type}}');
    }
}
