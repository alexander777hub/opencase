<?php

use yii\db\Migration;

/**
 * Class m220703_145433_alter_userform2
 */
class m220703_145433_alter_userform2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn( '{{%userform}}', 'first_name', $this->string(20)->null());
        $this->alterColumn( '{{%userform}}', 'second_name', $this->string(20)->null());
        $this->alterColumn( '{{%userform}}', 'soname', $this->string(20)->null());
        $this->alterColumn( '{{%userform}}', 'was_born', $this->string(20)->null());
        $this->alterColumn( '{{%userform}}', 'city_id',$this->integer(1)->notNull()->defaultValue(0) );



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn( '{{%userform}}', 'first_name',  $this->string(20)->notNull());
        $this->alterColumn( '{{%userform}}', 'second_name',  $this->string(20)->notNull());
        $this->alterColumn( '{{%userform}}', 'soname', $this->string(20)->notNull());
        $this->alterColumn( '{{%userform}}', 'was_born', $this->string(20)->notNull());
        $this->alterColumn( '{{%userform}}', 'city_id', $this->integer(10)->notNull());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220703_145433_alter_userform2 cannot be reverted.\n";

        return false;
    }
    */
}
