<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%members}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%status}}`
 */
class m220820_163236_create_members_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%members}}', [
            'id' => $this->primaryKey(),
            'status_id' => $this->integer()->defaultValue(1),
            'name'=>$this->string(),
            'family_name'=>$this->string(),
            'address'=>$this->string(),
            'country_of_origin'=>$this->string(),
            'email_adress'=>$this->string(),
            'phone_number'=>$this->string(),
            'age'=>$this->integer(),
            'hired'=>$this->boolean()->defaultValue(false),
        ]);

        // creates index for column `status_id`
        $this->createIndex(
            '{{%idx-members-status_id}}',
            '{{%members}}',
            'status_id'
        );

        // add foreign key for table `{{%status}}`
        $this->addForeignKey(
            '{{%fk-members-status_id}}',
            '{{%members}}',
            'status_id',
            '{{%status}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%status}}`
        $this->dropForeignKey(
            '{{%fk-members-status_id}}',
            '{{%members}}'
        );

        // drops index for column `status_id`
        $this->dropIndex(
            '{{%idx-members-status_id}}',
            '{{%members}}'
        );

        $this->dropTable('{{%members}}');
    }
}
