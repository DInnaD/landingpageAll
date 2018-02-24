<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PortfolioAll extends Model
{
    
    use SoftDeletes;
    protected $table = 'portfolio_alls';
    protected $fillable = ['id', 'name', 'filter', 'images', 'link', 'portfolioAll_id'];
    public function portfolios(){//es i 
        return $this->belongsTo(Portfolio::class, 'portfolioAll_id', 'id');//_bunch
    }//r
}
