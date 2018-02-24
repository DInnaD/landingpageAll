<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    //
    use SoftDeletes;
    protected $table = 'portfolios';
    protected $fillable = ['id', 'name', 'filter', 'images', 'link'];
    public function pages(){
		 return $this->hasMany(Page::class, 'portfolio_id', 'id');//_bunch
	}//route
	public function portfolioAlls(){
		 return $this->hasMany(PortfolioAll::class, 'portfolio_id', 'id');//_bunch
	}//route
	public function peopleAlls(){
		 return $this->hasMany(PeopleAll::class, 'portfolio_id', 'id');//_bunch
	}//route
	public function socialAlls(){
		 return $this->hasMany(SocialAll::class, 'portfolio_id', 'id');//_bunch
	}//route

	
}
