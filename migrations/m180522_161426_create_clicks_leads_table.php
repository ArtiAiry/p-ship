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
            'crm_id'=> $this->integer(),
            'ip' => $this->string(64),
            'user_device' => $this->string(64),
            'user_os' => $this->string(64),
            'user_id' => $this->integer(),
            'source' => $this->string(64),
            'product_id' => $this->integer(),
            'leads_status_id' => $this->integer()->defaultValue(1),
            'price' => $this->integer(),
            'isSold' => "TINYINT (1) default 1",
            'created_at' => "timestamp NOT NULL DEFAULT current_timestamp",
            'isRemoved'=> "TINYINT (1) default 1",

        ]);

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

        $this->createIndex(
            'idx-clicks_leads-user_id',
            'clicks_leads',
            'user_id'
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
            'fk-clicks_leads-leads_status',
            'clicks_leads',
            'leads_status_id',
            'leads_status',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-clicks_leads-user',
            'clicks_leads',
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
    public function down()
    {
        $this->dropTable('{{%clicks_leads}}');
    }
}
