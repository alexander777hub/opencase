<?php

use yii\db\Migration;

/**
 * Class m220705_163313_alter_userform_vk_link
 */
class m220705_163313_alter_userform_vk_link extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn( '{{%userform}}', 'vk_link', $this->string(100)->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn( '{{%userform}}', 'vk_link', $this->string(20)->null());

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220705_163313_alter_userform_vk_link cannot be reverted.\n";

        return false;
    }
    */
}
