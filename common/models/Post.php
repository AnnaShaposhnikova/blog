<?php


namespace common\models;


use common\traits\SoftDelete;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use common\models\User;

/**
 * Class Post
 * @package app\models
 *
 * @property User $user
 */
class Post extends ActiveRecord
{
    use SoftDelete;
    public static function tableName()
    {
        return 'post';
    }

    public function rules()
    {
        return [
            [['title','content'],'required']
        ];
    }
    public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                    ActiveRecord::EVENT_BEFORE_DELETE => ['deleted_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'user_id']);
    }

    public function getComments(){
        return $this->hasMany(Comment::className(),['post_id'=>'id']);
    }



}