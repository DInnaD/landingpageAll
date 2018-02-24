<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Socialy extends Model
{
    //
    use SoftDeletes;
    protected $table = 'socials1';
    protected $fillable = ['name', 'link', 'callBack'];
}
