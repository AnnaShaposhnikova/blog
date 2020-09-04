<?php

use yii\db\Migration;

/**
 * Class m191205_131343_update_comment_counter_column_in_post
 */
class m191205_131343_update_comment_counter_column_in_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->update('post',['comment_counter'=>0]);
        $this->alterColumn('post','comment_counter',$this->integer()->defaultValue(0));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191205_131343_update_comment_counter_column_in_post cannot be reverted.\n";

        return false;
    }
    */
}
