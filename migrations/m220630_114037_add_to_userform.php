<?php

use yii\db\Migration;

/**
 * Class m220630_114037_add_to_userform
 */
class m220630_114037_add_to_userform extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%userform}}', 'phone', $this->string(20)->null());
        $this->addColumn('{{%userform}}', 'vk_link', $this->string(20)->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%userform}}', 'photo');
        $this->dropColumn('{{%userform}}', 'credit');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220630_114037_add_to_userform cannot be reverted.\n";

        return false;
    }
    */
}
