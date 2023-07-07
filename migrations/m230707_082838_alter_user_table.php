<?php

use yii\db\Migration;

/**
 * Class m230707_082838_alter_user_table
 */
class m230707_082838_alter_user_table extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn( '{{%user}}', 'email', $this->string(255)->null());
        $this->alterColumn( '{{%user}}', 'password_hash', $this->string(60)->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn( '{{%user}}', 'email',  $this->string(255)->notNull());
        $this->alterColumn( '{{%user}}', 'password_hash', $this->string(60)->notNull());

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230707_082838_alter_user_table cannot be reverted.\n";

        return false;
    }
    */
}
