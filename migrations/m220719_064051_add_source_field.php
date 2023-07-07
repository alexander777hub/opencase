<?php

use yii\db\Migration;

/**
 * Class m220719_064051_add_source_field
 */
class m220719_064051_add_source_field extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%userform}}', 'source', $this->integer(1)->unsigned()->notNull()->defaultValue(0));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn('{{%userform}}', 'source');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220719_064051_add_source_field cannot be reverted.\n";

        return false;
    }
    */
}
