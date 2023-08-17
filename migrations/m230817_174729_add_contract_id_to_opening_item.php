<?php

use yii\db\Migration;

/**
 * Class m230817_174729_add_contract_id_to_opening_item
 */
class m230817_174729_add_contract_id_to_opening_item extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%opening_item}}', 'contract_id', $this->integer(11)->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%opening_item}}', 'contract_id', $this->integer(11)->null());

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230817_174729_add_contract_id_to_opening_item cannot be reverted.\n";

        return false;
    }
    */
}
