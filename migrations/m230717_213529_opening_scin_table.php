<?php

use yii\db\Migration;

/**
 * Class m230717_213529_opening_scin_table
 */
class m230717_213529_opening_scin_table extends Migration
{/**
 * {@inheritdoc}
 */
    public function safeUp()
    {
        $this->createTable('{{%opening_item}}', [
            'id'                => $this->primaryKey(),
            'case_id'        => $this->integer(11)->notNull(),
            'item_id'         => $this->integer(11)->notNull(),
            'user_id'         => $this->integer(11)->null(),
            'price'  =>  $this->decimal(13, 4)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%opening_item}}', [
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
        echo "m230717_213529_opening_scin_table cannot be reverted.\n";

        return false;
    }
    */
}
