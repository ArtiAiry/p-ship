<?php

use yii\db\Migration;

/**
 * Handles the creation of table `condition_user`.
 */
class m190831_211926_create_condition_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%condition_user}}', [
            'id' => $this->primaryKey()->unsigned()->unique(),
            'user_id' => $this->integer()->notNull(),
            'condition_id' => $this->integer()->unsigned()->notNull(),
            'user_condition_end_date' => $this->timestamp()->notNull(),
            'user_condition_created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->createIndex(
            'idx-condition_user-user_id',
            'condition_user',
            'user_id'
        );

        $this->createIndex(
            'idx-condition_user-condition_id',
            'condition_user',
            'condition_id'
        );

        $this->addForeignKey(
            'fk-condition_user-user_id',
            'condition_user',
            'user_id',
            'user',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-condition_user-condition_id',
            'condition_user',
            'condition_id',
            'condition',
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
            'fk-condition_user-user_id',
            'condition_user'
        );

        $this->dropForeignKey(
            'fk-condition_user-condition_id',
            'condition_user'
        );

        $this->dropIndex(
            'idx-condition_user-user_id',
            'condition_user'
        );

        $this->dropIndex(
            'idx-condition_user-condition_id',
            'condition_user'
        );

        $this->dropTable('{{%condition_user}}');
    }
}