<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Logo extends Model
{
    //
    use SoftDeletes;
    protected $table = 'logos1';
    protected $fillable = ['id', 'name', 'images'];//, 'favicons'
}
