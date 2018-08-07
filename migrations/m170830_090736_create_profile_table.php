<?php
use yii\db\Migration;
/**
 * Handles the creation of table `profile`.
 */
class m170830_090736_create_profile_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%profile}}', [
            'id' => 'pk',
            'user_id' => $this->integer()->notNull(),
            'first_name' => $this->string(64),
            'ip' => $this->string()->defaultValue(null),
            'last_name' => $this->string(64),
            'skype' => $this->string(255)->notNull()->unique()->defaultValue(null),
            'phone' => $this->string(24)->notNull()->defaultValue(null),
            'telegram' => $this->string(255)->notNull()->defaultValue(null),
            'whatsapp' => $this->string(255)->notNull()->defaultValue(null),
            'isRemoved'=> "TINYINT (1) default 1",
        ]);
        $this->createIndex(
            'idx-profile-user_id',
            'profile',
            'user_id'
        );
        $this->addForeignKey(
            'fk-profile-user',
            'profile',
            'user_id',
            'user',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }
    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%profile}}');
    }
}