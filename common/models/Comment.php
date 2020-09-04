<?php


namespace common\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\validators\RequiredValidator;
use common\models\User;

class Comment extends ActiveRecord
{
    public static function tableName(){
        return 'comment';
    }

    public function rules()
    {
        return [
            [['comment'], RequiredValidator::class],

        ];
    }
    public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'user_id']);
    }

    public function getPost(){
        return $this->hasOne(Post::className(),['id'=>'post_id']);
    }

}