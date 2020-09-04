<?php


namespace frontend\models;


use common\traits\SoftDelete;

class Post extends \common\models\Post
{
    use SoftDelete;
    public static function find()
    {

        $activeQuery = parent::find();
     $activeQuery->where(['deleted_at'=>null]);
     return $activeQuery;

    }

}