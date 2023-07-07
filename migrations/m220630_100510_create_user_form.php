<?php

use yii\db\Migration;

/**
 * Class m220630_100510_create_user_form
 */
class m220630_100510_create_user_form extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%userform}}', [
            'id'                => $this->primaryKey(),
            'first_name'        => $this->string(20)->notNull(),
            'second_name'       => $this->string(20)->notNull(),
            'soname'            => $this->string(20)->notNull(),
            'sex'               => $this->integer(1)->unsigned()->notNull()->defaultValue(0),
            'was_born'          => $this->string(20)->notNull(),
            'height'            => $this->smallInteger(3)->notNull()->unsigned()->defaultValue('0'),
            'weight'            => $this->smallInteger(3)->notNull()->unsigned()->defaultValue('0'),
            'city_id'           => $this->integer(10)->notNull(),
            'target'            => $this->string(20)->notNull(),
            'about_me'          => $this->text()->null(),
            'about_partner'     => $this->text()->null(),
            'find_zone'         => $this->integer(1)->unsigned()->notNull()->defaultValue(0),
            'ready_to_relocate' => $this->integer(1)->unsigned()->notNull()->defaultValue(0),
            'comment'           => $this->text()->null(),
            'avatar_id'         => $this->integer(10)->null(),
        ]);
        $this->createIndex('userform', 'userform', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%userform}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220630_100510_create_user_form cannot be reverted.\n";

        return false;
    }
    */
}
