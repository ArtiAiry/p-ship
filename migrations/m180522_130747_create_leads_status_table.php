<?php

use yii\db\Migration;

/**
 * Handles the creation of table `source_type`.
 */
class m180522_130747_create_leads_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%leads_status}}', [
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
        $this->dropTable('{{%leads_status}}');
    }
}
