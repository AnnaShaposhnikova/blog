<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m191114_124937_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(255)->notNull(),
            'last_name' => $this->string(255)->notNull(),
            'email'=> $this->string(255)->notNull()->unique(),
            'password'=>$this->string(255)->notNull(),
            'created_at'=>$this->timestamp()->defaultValue(null)->null(),
            'updated_at' =>$this->timestamp()->defaultValue(null)->null(),
            'deleted_at' =>$this->timestamp()->defaultValue(null)->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
