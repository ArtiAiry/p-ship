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
            'payout_type_id' => $this->integer()->defaultValue(null),
            'yandex_money' => $this->string(255)->defaultValue(null),
            'qiwi' => $this->string(255)->defaultValue(null),
            'webmoney_wmr' => $this->string(255)->defaultValue(null),
            'paypal_eur' => $this->string(255)->defaultValue(null),
            'sberbank_rub' => $this->string(255)->defaultValue(null),
            'user_id' => $this->integer()->defaultValue(null),
            'isMain'=> "TINYINT (1) default 1",
            'isRemoved'=> "TINYINT (1) default 1",
        ]);
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
    }
    public function down()
    {
        $this->dropTable('{{%wallet}}');
    }
}