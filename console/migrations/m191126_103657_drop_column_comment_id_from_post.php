<?php

use yii\db\Migration;

/**
 * Class m191126_103657_drop_column_comment_id_from_post
 */
class m191126_103657_drop_column_comment_id_from_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('post','comment_id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191126_103657_drop_column_comment_id_from_post cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191126_103657_drop_column_comment_id_from_post cannot be reverted.\n";

        return false;
    }
    */
}
