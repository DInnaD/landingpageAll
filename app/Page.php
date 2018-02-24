<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
	use SoftDeletes;
    //
    protected $table = 'pages1';
    //protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'alias', 'text', 'images', 'portfolio_id'];
    //'nameSecond'
    //'link', 'linkName', 'buttonWidder, 'filter', 'icon', 'logos'  'audios','videos'];
    //'filter', 'images' it is portfolio
    //'imagesFull' it is a haney + it is portfolio + 'slider'??
    //'icon','link', 'linkName', 'buttonWidder it is on button link
    public function portfolios(){//es i 
        return $this->belongsTo(Portfolio::class, 'portfolio_id', 'id');//_bunch
    }//r

}
