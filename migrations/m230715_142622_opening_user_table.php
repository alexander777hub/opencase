<?php

use yii\db\Migration;

/**
 * Class m230715_142622_opening_user_table
 */
class m230715_142622_opening_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%opening_user}}', [
            'id'                => $this->primaryKey(),
            'case_id'        => $this->integer(11)->notNull(),
            'user_id'         => $this->integer(11)->notNull(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%opening_user}}', [
        ]);
        return true;

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230715_142622_opening_user_table cannot be reverted.\n";

        return false;
    }
    */
}
