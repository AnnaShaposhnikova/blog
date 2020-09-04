<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m191115_093730_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer()->unsigned()->notNull(),
            'post_id'=>$this->integer()->unsigned()->notNull(),
            'comment'=>$this->text()->notNull(),
            'created_at'=>$this->timestamp()->defaultValue(null)->notNull(),
            'updated_at'=> $this->timestamp()->defaultValue(null),
            'deleted_at'=> $this->timestamp()->defaultValue(null),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comment}}');
    }
}
