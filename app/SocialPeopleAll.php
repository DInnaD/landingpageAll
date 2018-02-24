<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialPeopleAll extends Model
{
    use SoftDeletes;
    protected $table = 'socialpeople_alls';
    protected $fillable = ['id', 'name', 'link', 'callBack', 'peopleAll_id'];

    public function peopleAlls(){//es i 
        return $this->belongsTo(PeopleAll::class, 'peopleAll_id', 'id');//_bunch
    }//r
}
