<?php

use yii\db\Migration;

/**
 * Class m220630_124232_add_toPhoto
 */
class m220630_124232_add_toPhoto extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%photo}}', 'link', $this->string(50)->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%photo}}', 'link');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220630_124232_add_toPhoto cannot be reverted.\n";

        return false;
    }
    */
}
