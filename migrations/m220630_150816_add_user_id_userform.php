<?php

use yii\db\Migration;

/**
 * Class m220630_150816_add_user_id_userform
 */
class m220630_150816_add_user_id_userform extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%userform}}', 'user_id', $this->integer()->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%userform}}', 'user_id');

    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220630_150816_add_user_id_userform cannot be reverted.\n";

        return false;
    }
    */
}
