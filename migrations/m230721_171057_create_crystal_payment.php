<?php

use yii\db\Migration;

/**
 * Class m230721_171057_create_crystal_payment
 */
class m230721_171057_create_crystal_payment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%crystal_order}}', [
            'id' => $this->primaryKey(),
            'status' => $this->integer(1)->notNull()->defaultValue(0),
            'type' => $this->string(255)->notNull()->defaultValue('topup'),
            'payment' => $this->string(36),
            'required_method' => $this->string(20)->notNull()->defaultValue(''),
            'amount_currency' => $this->string(20)->notNull()->defaultValue('RUB'),
            'email' => $this->string(255)->notNull(),
            'description' => $this->string(255)->null(),
            'user_id' => $this->integer(11)->notNull(),
            'lifetime' => $this->string(255)->notNull()->defaultValue('4320'),
            'redirect_url' => $this->string(255)->null(),
            'callback_url' => $this->string(255)->null(),
            'amount'  =>  $this->decimal(5, 2)->notNull(),
            'link' => $this->string(255)->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%crystal_order}}');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230721_171057_create_crystal_payment cannot be reverted.\n";

        return false;
    }
    */
}
