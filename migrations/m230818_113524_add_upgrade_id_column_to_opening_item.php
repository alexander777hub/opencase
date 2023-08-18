<?php

use yii\db\Migration;

/**
 * Class m230818_113524_add_upgrade_id_column_to_opening_item
 */
class m230818_113524_add_upgrade_id_column_to_opening_item extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%opening_item}}', 'upgrade_id', $this->integer(11)->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%opening_item}}', 'upgrade_id');


        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230818_113524_add_upgrade_id_column_to_opening_item cannot be reverted.\n";

        return false;
    }
    */
}
