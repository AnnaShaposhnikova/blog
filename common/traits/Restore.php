<?php


namespace common\traits;


use yii\db\Expression;

trait Restore
{
    public function restore(){

        $this->deleted_at = null;
        $this->save();
        return true;

    }

}