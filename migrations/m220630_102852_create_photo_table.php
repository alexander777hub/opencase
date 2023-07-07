<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%photo}}`.
 */
class m220630_102852_create_photo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%photo}}', [
            'id' => $this->primaryKey(),
            'userform_id'      => $this->integer(10)->notNull(),
            'type'        => $this->integer(1)->unsigned()->notNull()->defaultValue(1),
        ]);
        $this->createIndex('userform', 'photo', 'id');
        $this->createIndex(
            'idx-photo-userform_id',
            'photo',
            'userform_id'
        );

        $this->addForeignKey(
            'fk-photo-userform_id',
            'photo',
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
