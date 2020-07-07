<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public $timestamps =false;

    public function school()
    {
        return $this->hasMany(School::class,'categories_id');
    }
}
