<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialPeople extends Model
{
    //
    use SoftDeletes;
    protected $table = 'socialpeoples1';
    protected $fillable = ['id', 'name', 'link', 'callBack', 'people_id'];

    public function peoples(){//es i 
        return $this->belongsTo(People::class, 'people_id', 'id');//_bunch
    }//r
}
