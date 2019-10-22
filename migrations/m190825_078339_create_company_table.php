<?php

use yii\db\Migration;

/**
 * Handles the creation of table `clicks_leads`.
 */
class m190825_078339_create_company_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%company}}', [
            'id' => $this->primaryKey()->unsigned()->unique(),
            'name' => $this->string(255)->notNull()->unique(),
            'info' => $this->text(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'isRemoved' => "TINYINT (1) default 1",
        ]);
    }

    /**
     * {@inheritdoc}
     */

    public function safeDown()
    {
        $this->dropTable('{{%company}}');
    }
}
