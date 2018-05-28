<?php

use yii\db\Migration;

/**
 * Handles the creation of table `source`.
 */
class m180522_113443_create_source_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%source}}', [
            'id' => 'pk',
            'name' => $this->string(255),
            'source_type_id' => $this->integer()->defaultValue(1),
            'user_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->defaultValue(1),
            'monetization_type_id' => $this->integer()->defaultValue(1),
            'source_status_id' => $this->integer()->defaultValue(1),
            'created_at' => "timestamp NOT NULL DEFAULT current_timestamp",
            'isRemoved' => "TINYINT (1) default 1",
        ]);

        $this->createIndex(
            'idx-source-source_type_id',
            'source',
            'source_type_id'
        );

        $this->createIndex(
            'idx-source-user_id',
            'source',
            'user_id'
        );

        $this->createIndex(
            'idx-source-monetization_type_id',
            'source',
            'monetization_type_id'
        );

        $this->createIndex(
            'idx-source-product_id',
            'source',
            'product_id'
        );

        $this->createIndex(
            'idx-source-source_status_id',
            'source',
            'source_status_id'
        );


        $this->addForeignKey(
            'fk-source-source_type',
            'source',
            'source_type_id',
            'source_type',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-source-user',
            'source',
            'user_id',
            'user',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-source-product',
            'source',
            'product_id',
            'product',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-source-monetization_type',
            'source',
            'monetization_type_id',
            'monetization_type',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-source-source_status',
            'source',
            'source_status_id',
            'source_status',
            'id',
            'CASCADE',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%source}}');
    }
}
