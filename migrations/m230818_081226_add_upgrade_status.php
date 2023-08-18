<?php

use yii\db\Migration;

/**
 * Class m230818_081226_add_upgrade_status
 */
class m230818_081226_add_upgrade_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('{{%opening_item}}', 'upgrade_status', $this->tinyInteger(1)->notNull()->defaultValue(0));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%opening_item}}', 'upgrade_status');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230818_081226_add_upgrade_status cannot be reverted.\n";

        return false;
    }
    */
}
