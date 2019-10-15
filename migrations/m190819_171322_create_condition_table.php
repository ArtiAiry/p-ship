<?php

use yii\db\Migration;

/**
 * Handles the creation of table `condition`.
 */
class m190819_171322_create_condition_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%condition}}', [
            'id' => $this->primaryKey()->unsigned()->unique(),
            'product_id' => $this->integer(),
            'discount' => $this->string(255)->notNull(),
            'profit' => $this->string(255)->notNull(),
            'end_date' => $this->timestamp()->notNull(),
            'type' => $this->string(20)->notNull(),
            'status' => $this->string(20)->notNull(),
            'priority' =>$this->integer()->unsigned()->notNull()->defaultValue(0),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->createIndex(
            'idx-condition-product_id',
            'condition',
            'product_id'
        );

        $this->addForeignKey(
            'fk-condition-product_id',
            'condition',
            'product_id',
            'product',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-condition-product_id',
            'condition'
        );

        $this->dropIndex(
            'idx-condition-product_id',
            'condition'
        );

        $this->dropTable('{{%condition}}');
    }
}
