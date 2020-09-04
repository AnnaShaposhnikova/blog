<?php


namespace backend\models;


use common\traits\SoftDelete;
use common\traits\Restore;



class Post extends \common\models\Post
{
    use SoftDelete;
    use Restore;

    public function rules(){
        return [
            [['title','content'],'required'],
            ['title','string','min'=>4],


        ];
    }





}