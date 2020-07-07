<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schools';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','address','contact','time_work'];

//    public function teachers() {
//        return $this->belongsToMany(User::class,'school_user');//hasmanyWithConditions
//    }
//
    public function supervisors()
    {
        return $this->belongsToMany(User::class,'role_school_user');
//        ->withPivot('role_id');
//            ->withPivot('role_id', 2);
//            ->orderBy('name');
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class,'role_school_user');
//            ->withPivot('role_id', 4);
//            ->orderBy('name');
    }


}
