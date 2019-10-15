<?php

use yii\db\Migration;

/**
 * Handles adding company_id to table `product`.
 */
class m190825_094010_add_company_id_column_to_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product', 'company_id', 'integer unsigned AFTER `id`');

        $this->createIndex(
            'idx-product-company_id',
            'product',
            'company_id'
        );

        $this->addForeignKey(
            'fk-product-company_id',
            'product',
            'company_id',
            'company',
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
            'fk-product-company_id',
            'product'
        );

        $this->dropIndex(
            'idx-product-company_id',
            'product'
        );

        $this->dropColumn('product', 'company_id');
    }
}