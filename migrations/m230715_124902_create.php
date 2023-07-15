<?php

use yii\db\Migration;

/**
 * Class m230715_124902_create
 */
class m230715_124902_create extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%opening}}', [
            'id'                => $this->primaryKey(),
            'name'        => $this->string(20)->notNull(),
            'avatar_id'         => $this->integer(10)->null(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%opening}}');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230715_124902_create cannot be reverted.\n";

        return false;
    }
    */
}
