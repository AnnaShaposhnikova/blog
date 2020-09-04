<?php

use yii\db\Migration;
use common\models\User;

/**
 * Class m191219_104139_insert_into_user_row_create_admin
 */
class m191219_104139_insert_into_user_row_create_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user',[
            'first_name'=>'admin',
            'last_name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>Yii::$app->getSecurity()->generatePasswordHash('123123123'),
             'role'=>User::ADMIN_ROLE,
            'created_at'=>new \yii\db\Expression('NOW()'),

                                ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191219_104139_insert_into_user_row_create_admin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191219_104139_insert_into_user_row_create_admin cannot be reverted.\n";

        return false;
    }
    */
}
