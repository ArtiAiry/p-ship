<?php

use yii\db\Migration;

/**
 * Handles the creation of table `promocode`.
 */
class m190831_211734_create_promocode_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%promocode}}', [
            'id' => $this->primaryKey()->unsigned()->unique(),
            'user_id' => $this->integer(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->createIndex(
            'idx-promocode-user_id',
            'promocode',
            'user_id'
        );

        $this->addForeignKey(
            'fk-promocode-user_id',
            'promocode',
            'user_id',
            'user',
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
            'fk-promocode-user_id',
            'promocode'
        );

        $this->dropIndex(
            'idx-promocode-user_id',
            'promocode'
        );

        $this->dropTable('{{%promocode}}');
    }
}