<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m191115_091509_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer()->unsigned()->notNull(),
            'comment_id'=>$this->integer()->unsigned(),
            'title' =>$this->string(255)->notNull(),
            'content'=>$this->text()->notNull(),
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
        $this->dropTable('{{%post}}');
    }
}
