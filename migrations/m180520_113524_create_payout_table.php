<?php

use yii\db\Migration;

/**
 * Handles the creation of table `payout`.
 */
class m180520_113524_create_payout_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%payout}}', [
            'id' => 'pk',
            'wallet_type_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'payout_sum' => $this->integer(),
            'payout_currency' => $this->integer(),
            'payout_sum_rub' => $this->integer(),
            'payout_status_id' => $this->integer()->defaultValue(1),
            'comment' => $this->string(255)->defaultValue(null),
            'created_at' => "timestamp NOT NULL DEFAULT current_timestamp",
            'isRemoved'=> "TINYINT (1) default 1",

        ]);

        $this->createIndex(
            'idx-payout-wallet_type_id',
            'payout',
            'wallet_type_id'
        );

        $this->createIndex(
            'idx-payout-user_id',
            'payout',
            'user_id'
        );

        $this->createIndex(
            'idx-payout-payout_status_id',
            'payout',
            'payout_status_id'
        );

        $this->addForeignKey(
            'fk-payout-wallet_type',
            'payout',
            'wallet_type_id',
            'wallet_type',
            'id',
            'CASCADE',
            'CASCADE'
        );


        $this->addForeignKey(
            'fk-payout-user',
            'payout',
            'user_id',
            'user',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-payout-payout_status',
            'payout',
            'payout_status_id',
            'payout_status',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }



    public function down()
    {
        $this->dropTable('{{%payout}}');
    }
}
