<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\People;
use App\PeopleAll;
use App\Portfolio;
use App\PortfolioAll;
use App\Portfolio1;
use App\Service;
use App\SocialPeople;
use App\SocialPeopleAll;
use App\Logo;
use App\Socialy;
use App\SocialAll;



use DB;
use App\Http\Requests;

class PageController extends Controller
{
    //
    public function execute($alias){
    	if(!$alias){
    		abort(404);
    	}
    	if(view()->exists('site.page')){
    		$page = Page::where('alias',strip_tags($alias))->first();
        // public function execute($alias){
        // if(!$alias){
        //     abort(404);
        // }    
        // if(view()->exists('site.pageOne')){
        //     $page = PageMoreOne::where('alias',strip_tags($alias))->first();
        // public function execute($alias){
        // if(!$alias){
        //     abort(404);
        // }
        // if(view()->exists('site.pageTwo')){
        //     $page = PageMoreTwo::where('alias',strip_tags($alias))->first();
        // public function execute($alias){
        // if(!$alias){
        //     abort(404);
        // }
        // if(view()->exists('site.pageThree')){
        //     $page = PageMoreThree::where('alias',strip_tags($alias))->first();
        // public function execute($alias){
        // if(!$alias){
        //     abort(404);
        // }
        // if(view()->exists('site.pageFour')){
        //     $page = PageMoreFour::where('alias',strip_tags($alias))->first();
        // public function execute($alias){
        // if(!$alias){
        //     abort(404);
        // }
        // if(view()->exists('site.pageFive')){
        //     $page = PageMoreFive::where('alias',strip_tags($alias))->first();    
        $pages = Page::all();                
        $portfolios = Portfolio::all();
    	$portfolioAlls = PortfolioAll::all();
        $services = Service::where('id','<',20)->get();
        $peopleAlls = PeopleAll::all();
        $tagMores = DB::table('portfolio_alls')->distinct()->pluck('filter');
        $socialAlls = SocialAll::take(24)->get();
        $socialPeopleAlls = SocialPeopleAll::all();
        $logos = Logo::take(1)->get();
        // $tags = DB::table('portfolios2')->distinct()->pluck('filter');
        // $tags = DB::table('portfolios3')->distinct()->pluck('filter');
        // $tags = DB::table('portfolios4')->distinct()->pluck('filter');
        // $tags = DB::table('portfolios5')->distinct()->pluck('filter');
     //dd($socials);
        // //MENU
        // $menu = array();
        // //from db
        // foreach ($pages as $page) {
        //     # code...
        //     $item = array('title'=>$page->name, 'alias'=>$page->alias);
        //     //alias or link
        //     array_push($menu, $item);
        // }
        // //dd($menu);
        // //from hand
        // $item =array('title'=>'Services','alias'=>'service');
        // array_push($menu, $item);
        // $item =array('title'=>'Portfolio','alias'=>'Portfolio');
        // array_push($menu, $item);
        // $item =array('title'=>'Team','alias'=>'team');
        // array_push($menu, $item);
        // $item =array('title'=>'Contacts','alias'=>'contact');
        // array_push($menu, $item);
        // //dd($menu);
       
    //     $data = [



    //             'title' => $pageMoreOne->name,
    //             'pageMoreOne' => $pageMoreOne,

               
    //         //'pages' => $pages,
    //         'services' => $services,
    //         'portfolios' => $portfolios,
    //         'peoples' => $peoples,
    //         'tags'=> $tags,
    //         'socials' => $socials,
    //         'socialPeoples' => $socialPeoples,
        
    //         'logos'=> $logos,

    //         ];
    //         return  view('site.page', $data);
    //     }else{
    //         abort(404);
        
    //     }

    // }


       //['id', 'name', 'alias', 'text', 'images', 'portfolio_id'];//'link', 'linkName', 'buttonWidder, 'filter', 'icon', 'logos'  'audios','videos'];
    		$data = [



    			'title' => $page->name,
    			'page' => $page,

               
            //'pages' => $pages,
            'services' => $services,
            'portfolioAlls' => $portfolioAlls,
            'portfolios' => $portfolios,
            'peopleAlls' => $peopleAlls,
            'tagMores'=> $tagMores,
            'socialAlls' => $socialAlls,
            'socialPeopleAlls' => $socialPeopleAlls,
            'pages' => $pages,
            'logos'=> $logos,

    		];
    		return  view('site.page', $data);
    	}else{
    		abort(404);
    	
    	}

    }

    public function executePortfolio($alias){
        if(!$alias){
            abort(404);
        }
        if(view()->exists('site.page')){
            $page = Page::where('alias',strip_tags($alias))->first();
        // public function execute($alias){
        // if(!$alias){
        //     abort(404);
        // }    
        // if(view()->exists('site.pageOne')){
        //     $page = PageMoreOne::where('alias',strip_tags($alias))->first();
        // public function execute($alias){
        // if(!$alias){
        //     abort(404);
        // }
        // if(view()->exists('site.pageTwo')){
        //     $page = PageMoreTwo::where('alias',strip_tags($alias))->first();
        // public function execute($alias){
        // if(!$alias){
        //     abort(404);
        // }
        // if(view()->exists('site.pageThree')){
        //     $page = PageMoreThree::where('alias',strip_tags($alias))->first();
        // public function execute($alias){
        // if(!$alias){
        //     abort(404);
        // }
        // if(view()->exists('site.pageFour')){
        //     $page = PageMoreFour::where('alias',strip_tags($alias))->first();
        // public function execute($alias){
        // if(!$alias){
        //     abort(404);
        // }
        // if(view()->exists('site.pageFive')){
        //     $page = PageMoreFive::where('alias',strip_tags($alias))->first(); 
        $pages = Page::all();                   
        $portfolios = Portfolio::all();
        $portfolioAlls = PortfolioAll::all();//get(array('id', 'name', 'filter', 'images', 'link' ));
        $services = Service::where('id','<',20)->get();
        $peopleAlls = PeopleAll::all();//take(3)->get();

        
        //$tags = DB::table('portfolios')->distinct()->pluck('filter');
        $tagMores = DB::table('portfolio_alls')->distinct()->pluck('filter');
        // $tags = DB::table('portfolios2')->distinct()->pluck('filter');
        // $tags = DB::table('portfolios3')->distinct()->pluck('filter');
        // $tags = DB::table('portfolios4')->distinct()->pluck('filter');
        // $tags = DB::table('portfolios5')->distinct()->pluck('filter');
     //dd($socials);
        $socialAlls = SocialAll::take(24)->get();
        //dd($socials);
        $socialPeopleAlls = SocialPeopleAll::all();//take(5)->get();
        $logos = Logo::take(1)->get();
        // //MENU
        // $menu = array();
        // //from db
        // foreach ($pages as $page) {
        //     # code...
        //     $item = array('title'=>$page->name, 'alias'=>$page->alias);
        //     //alias or link
        //     array_push($menu, $item);
        // }
        // //dd($menu);
        // //from hand
        // $item =array('title'=>'Services','alias'=>'service');
        // array_push($menu, $item);
        // $item =array('title'=>'Portfolio','alias'=>'Portfolio');
        // array_push($menu, $item);
        // $item =array('title'=>'Team','alias'=>'team');
        // array_push($menu, $item);
        // $item =array('title'=>'Contacts','alias'=>'contact');
        // array_push($menu, $item);
        // //dd($menu);
       
    //     $data = [



    //             'title' => $pageMoreOne->name,
    //             'pageMoreOne' => $pageMoreOne,

               
    //         //'pages' => $pages,
    //         'services' => $services,
    //         'portfolios' => $portfolios,
    //         'peoples' => $peoples,
    //         'tags'=> $tags,
    //         'socials' => $socials,
    //         'socialPeoples' => $socialPeoples,
        
    //         'logos'=> $logos,

    //         ];
    //         return  view('site.page', $data);
    //     }else{
    //         abort(404);
        
    //     }

    // }


       //['id', 'name', 'alias', 'text', 'images', 'portfolio_id'];//'link', 'linkName', 'buttonWidder, 'filter', 'icon', 'logos'  'audios','videos'];
            $data = [



                'title' => $page->name,
                'page' => $page,

               
            //'pages' => $pages,
            'services' => $services,
            'portfolios' => $portfolios,
            'portfolioAlls' => $portfolioAlls,
            'peopleAlls' => $peopleAlls,
            'tagMores'=> $tagMores,
            'socialAlls' => $socialAlls,
            'socialPeopleAlls' => $socialPeopleAlls,
            'pages' => $pages,
            'logos'=> $logos,

            ];
            return  view('site.portfolio', $data);
        }else{
            abort(404);
        
        }

    }
}
