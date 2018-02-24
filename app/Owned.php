<?php 
namespace App;

trait Owned
//::select('author', app('Author')->pluck...
{
public function owned($query){
return $query -> where('created_by', \Auth::user()->id);
}
 
}