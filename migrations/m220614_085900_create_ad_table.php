<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ad}}`.
 */
class m220614_085900_create_ad_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ad}}', [
            'id'          => $this->primaryKey(),
            'created_at'  => $this->dateTime() . ' DEFAULT NOW()',
            'updated_at'  => $this->dateTime()->null(),
            'status'      => $this->integer(1)->unsigned()->notNull()->defaultValue(0),
            'type'        => $this->integer(1)->unsigned()->notNull()->defaultValue(1),
            'description' => $this->string(1000)->null(),
            'title' => $this->string(20)->notNull(),
            'sex'         => $this->integer(1)->unsigned()->notNull()->defaultValue(0),
            'age'         => $this->integer(3)->unsigned()->notNull()->defaultValue(18),
            'user_id'      => $this->integer(10)->notNull(),
        ]);
        $this->createIndex('order', 'ad', 'id');
        $this->createIndex(
            'idx-ad-user_id',
            'ad',
            'user_id'
        );

        $this->addForeignKey(
            'fk-ad-user_id',
            'ad',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ad}}');
    }
}
