<?php

use yii\db\Migration;

/**
 * Class m230707_092523_drop_username_unique
 */
class m230707_092523_drop_username_unique extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropIndex('{{%user_unique_username}}', '{{%user}}');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->createIndex('{{%user_unique_username}}', '{{%user}}', 'username', true);

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230707_092523_drop_username_unique cannot be reverted.\n";

        return false;
    }
    */
}
