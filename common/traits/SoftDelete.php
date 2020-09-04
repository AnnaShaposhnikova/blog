<?php

namespace common\traits;
use yii\db\Expression;

trait SoftDelete
{
    public function softDelete(){
        $this->deleted_at = new Expression('NOW()');
        $this->save();
        return true;

    }
}