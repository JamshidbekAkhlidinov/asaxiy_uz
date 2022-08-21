<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%status}}`.
 */
class m220820_161601_create_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%status}}', [
            'id' => $this->primaryKey(),
            'status_name'=>$this->string(),
        ]);

        $arr =  [ 
            "yangi",
            "intervyu belgilangan",
            "qabul qilingan",
            "qabul qilinmagan",
        ];

        foreach ($arr as $id => $name) {
            $this->insert('{{%status}}',[
                'status_name'=>$name,
            ]);
        }
       
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%status}}');
    }
}
