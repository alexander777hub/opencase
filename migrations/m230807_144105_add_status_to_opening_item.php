<?php

use yii\db\Migration;

/**
 * Class m230807_144105_add_status_to_opening_item
 */
class m230807_144105_add_status_to_opening_item extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%opening_item}}', 'status', $this->integer(11)->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%opening_item}}', 'status');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230807_144105_add_status_to_opening_item cannot be reverted.\n";

        return false;
    }
    */
}
