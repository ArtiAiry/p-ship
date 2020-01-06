<?php

use yii\db\Migration;

/**
 * Handles the creation of table `media`.
 */
class m191224_121423_create_media_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%media}}', [
            'id' => 'pk',
            'tilte' => $this->string(255)->notNull(),
            'description'=>$this->string(255)->defaultValue(null),
            'source' => $this->string(255)->notNull(),
            'product_id' => $this->integer()->notNull(),
            'media_type_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'isRemoved' => "TINYINT (1) default 1",

        ]);

        $this->createIndex(
            'idx-media-media_type_id',
            'media',
            'media_type_id'
        );

        $this->addForeignKey(
            'fk-media-media_type',
            'media',
            'media_type_id',
            'media_type',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex(
            'idx-media-product_id',
            'media',
            'product_id'
        );

        $this->addForeignKey(
            'fk-media-product',
            'media',
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
            'fk-media-product',
            'media'
        );

        $this->dropForeignKey(
            'fk-media-media_type',
            'media'
        );

        $this->dropIndex(
            'idx-media-product_id',
            'media'
        );

        $this->dropIndex(
            'idx-media-media_type_id',
            'media'
        );

        $this->dropTable('{{%media}}');
    }
}
