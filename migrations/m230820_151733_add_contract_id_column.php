<?php

use yii\db\Migration;

/**
 * Class m230820_151733_add_contract_id_column
 */
class m230820_151733_add_contract_id_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%opening_item}}', 'contract_id', $this->integer(11)->null());
        $this->addColumn('{{%opening_item}}', 'contract_status', $this->tinyInteger(1)->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%opening_item}}', 'contract_id');
        $this->dropColumn('{{%opening_item}}', 'contract_status');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230820_151733_add_contract_id_column cannot be reverted.\n";

        return false;
    }
    */
}
