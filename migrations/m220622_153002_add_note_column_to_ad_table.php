<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%ad}}`.
 */
class m220622_153002_add_note_column_to_ad_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%ad}}', 'note', $this->text()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%ad}}', 'note');
    }
}
