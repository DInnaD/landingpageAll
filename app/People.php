<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class People extends Model
{
    //
    use SoftDeletes;
    protected $table = 'peoples1';
    protected $fillable = ['id', 'name', 'position', 'text', 'images'];
    public function socialPeoples(){
		 return $this->hasMany(SocialPeople::class, 'people_id', 'id');//_bunch
	}//route
}
