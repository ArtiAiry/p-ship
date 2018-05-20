<?php
use yii\db\Migration;
/**
 * Handles the creation of table `wallet`.
 */
class m180501_083335_create_wallet_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%wallet}}', [
            'id' => 'pk',
            'yandex_money' => $this->string(255)->defaultValue(null),
            'qiwi' => $this->string(255)->defaultValue(null),
            'webmoney_wmr' => $this->string(255)->defaultValue(null),
            'paypal_eur' => $this->string(255)->defaultValue(null),
            'sberbank_rub' => $this->string(255)->defaultValue(null),
            'pb_uah' => $this->string(255)->defaultValue(null),
            'user_id' => $this->integer()->defaultValue(null),
            'wallet_type_id' => $this->integer()->defaultValue(null),
            'isRemoved'=> "TINYINT (1) default 1",
        ]);

        $this->createIndex(
            'idx-wallet-wallet_type_id',
            'wallet',
            'wallet_type_id'
        );

        $this->createIndex(
            'idx-wallet-user_id',
            'wallet',
            'user_id'
        );

        $this->addForeignKey(
            'fk-wallet-user',
            'wallet',
            'user_id',
            'user',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-wallet-wallet_type',
            'wallet',
            'wallet_type_id',
            'wallet_type',
            'id',
            'CASCADE',
            'CASCADE'
        );

    }
    public function down()
    {
        $this->dropTable('{{%wallet}}');
    }
}