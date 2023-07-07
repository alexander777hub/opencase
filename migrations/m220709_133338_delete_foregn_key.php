<?php

use yii\db\Migration;

/**
 * Class m220709_133338_delete_foregn_key
 */
class m220709_133338_delete_foregn_key extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-ad-user_id','ad');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220709_133338_delete_foregn_key cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220709_133338_delete_foregn_key cannot be reverted.\n";

        return false;
    }
    */
}
