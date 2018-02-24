<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Index extends Model
{
    //
    use SoftDeletes;
     protected $hidden = [
        'created_at', 'updated_at',
    ];
    protected $table = 'wordbooks1';
    protected $fillable = ['id', 'name', 'filter', 'text', 'images'];

}
