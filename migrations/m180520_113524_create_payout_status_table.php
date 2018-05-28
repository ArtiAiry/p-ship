<?php

use yii\db\Migration;

/**
 * Handles the creation of table `payout`.
 */
class m180520_113524_create_payout_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%payout_status}}', [
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
        $this->dropTable('{{%payout_status}}');
    }
}
