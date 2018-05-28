<?php

use yii\db\Migration;

/**
 * Handles the creation of table `clicks_leads`.
 */
class m180522_161426_create_clicks_leads_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%clicks_leads}}', [
            'id' => 'pk',
            'ip' => $this->string(64),
            'user_device' => $this->string(64),
            'user_os' => $this->string(64),
            'source_id' => $this->integer(),
            'source_type_id' => $this->integer(),
            'monetization_type_id' => $this->integer(),
            'product_id' => $this->integer(),
            'leads_status_id' => $this->integer()->defaultValue(1),
            'price' => $this->integer(),
            'isSold' => "TINYINT (1) default 1",
            'created_at' => "timestamp NOT NULL DEFAULT current_timestamp",
            'isRemoved'=> "TINYINT (1) default 1",

        ]);

        $this->createIndex(
            'idx-clicks_leads-source_type_id',
            'clicks_leads',
            'source_type_id'
        );

        $this->createIndex(
            'idx-clicks_leads-source_id',
            'clicks_leads',
            'source_id'
        );

        $this->createIndex(
            'idx-clicks_leads-monetization_type_id',
            'clicks_leads',
            'monetization_type_id'
        );

        $this->createIndex(
            'idx-clicks_leads-product_id',
            'clicks_leads',
            'product_id'
        );

        $this->createIndex(
            'idx-clicks_leads-leads_status_id',
            'clicks_leads',
            'leads_status_id'
        );


        $this->addForeignKey(
            'fk-clicks_leads-source_type',
            'clicks_leads',
            'source_type_id',
            'source_type',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-clicks_leads-source',
            'clicks_leads',
            'source_id',
            'source',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-clicks_leads-product',
            'clicks_leads',
            'product_id',
            'product',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-clicks_leads-monetization_type',
            'clicks_leads',
            'monetization_type_id',
            'monetization_type',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-clicks_leads-leads_status',
            'clicks_leads',
            'leads_status_id',
            'leads_status',
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
        $this->dropTable('{{%clicks_leads}}');
    }
}
