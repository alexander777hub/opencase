<?php

use yii\db\Migration;

/**
 * Class m220709_095720_add_manager_user_to_userform
 */
class m220709_095720_add_manager_user_to_userform extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%userform}}', 'manager_id', $this->integer(10)->unsigned()->null());


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%userform}}', 'manager_id');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220709_095720_add_manager_user_to_userform cannot be reverted.\n";

        return false;
    }
    */
}
