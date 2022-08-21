<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%notes}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%members}}`
 */
class m220821_121148_create_notes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%notes}}', [
            'id' => $this->primaryKey(),
            'members_id' => $this->integer(),
            'note'=>$this->text(),
            'time'=>$this->string(10),
        ]);

        // creates index for column `members_id`
        $this->createIndex(
            '{{%idx-notes-members_id}}',
            '{{%notes}}',
            'members_id'
        );

        // add foreign key for table `{{%members}}`
        $this->addForeignKey(
            '{{%fk-notes-members_id}}',
            '{{%notes}}',
            'members_id',
            '{{%members}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%members}}`
        $this->dropForeignKey(
            '{{%fk-notes-members_id}}',
            '{{%notes}}'
        );

        // drops index for column `members_id`
        $this->dropIndex(
            '{{%idx-notes-members_id}}',
            '{{%notes}}'
        );

        $this->dropTable('{{%notes}}');
    }
}
