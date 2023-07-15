<?php

use yii\db\Migration;

/**
 * Class m230715_141921_add_user_id_field_to_opening
 */
class m230715_141921_add_user_id_field_to_opening extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%opening}}', 'user_id', $this->integer(11)->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%opening}}', 'user_id');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230715_141921_add_user_id_field_to_opening cannot be reverted.\n";

        return false;
    }
    */
}
