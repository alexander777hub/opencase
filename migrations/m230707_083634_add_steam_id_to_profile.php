<?php

use yii\db\Migration;

/**
 * Class m230707_083634_add_steam_id_to_profile
 */
class m230707_083634_add_steam_id_to_profile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%profile}}', 'steam_id', $this->string()->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%profile}}', 'steam_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230707_083634_add_steam_id_to_profile cannot be reverted.\n";

        return false;
    }
    */
}
