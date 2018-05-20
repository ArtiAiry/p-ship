<?php

use yii\db\Migration;

/**
 * Handles the creation of table `wallet_type`.
 */
class m180520_100131_create_wallet_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%wallet_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'isRemoved' => "TINYINT (1) default 1",
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%wallet_type}}');
    }
}
