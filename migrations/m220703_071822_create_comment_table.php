<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m220703_071822_create_comment_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'userform_id'      => $this->integer(10)->notNull(),
            'user_id'      => $this->integer(10)->notNull(),
            'text' => $this->text()->notNull(),
            'created_at'  => $this->dateTime() . ' DEFAULT NOW()',
        ]);
        $this->createIndex('userform', 'comment', 'id');
        $this->createIndex(
            'idx-comment-userform_id',
            'comment',
            'userform_id'
        );

        $this->addForeignKey(
            'fk-comment-userform_id',
            'comment',
            'userform_id',
            'userform',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%photo}}');
    }
}
