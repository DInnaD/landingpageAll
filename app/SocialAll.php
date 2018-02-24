<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialAll extends Model
{
    use SoftDeletes;
    protected $table = 'social_alls';
    protected $fillable = ['name', 'link', 'callBack', 'socialsAll_id'];
    public function portfolios(){//es i 
        return $this->belongsTo(Portfolio::class, 'socialsAll_id', 'id');//_bunch
    }//r

}
