<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
* Main page route 'middleware' => 'web'
*/
Route::group([], function (){
	//pages  + UserSender is absent
	Route::match(['get','post'],'/',['uses'=>'IndexController@execute','as'=>'home']);

 	
 	//WEBmenu is apsent
    Route::get('/page/{alias}',['uses'=>'PageController@execute','as'=>'page']);
 	Route::get('/portfolio/{alias}',['uses'=>'PageController@executePortfolio','as'=>'portfolio']);
 	Route::get('/pageMore/{alias}',['uses'=>'PageController@executeMore2','as'=>'pageMore']);
 	Route::get('/pageMore/{alias}',['uses'=>'PageController@executeMore3','as'=>'pageMore']);
 	Route::get('/pageMore/{alias}',['uses'=>'PageController@executeMore4','as'=>'pageMore']);
 	Route::get('/pageMore/{alias}',['uses'=>'PageController@executeMore5','as'=>'pageMore']);
 	 
   
    //filter prases is apsent
    Route::get('/wordbook/{name}',function(){
	return redirect('/');
	})->where('name','[A-Za-z]+');
	Route::resource('wordbook','PageController');
	Route::post('getData','PageController@getData');
	});
	//confirmmail is apsent, further... 
/**
* AdminPanel page route
*/

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');
/**
* Admin page route
*/

Route::group(['prefix' => 'admin','middleware' => 'auth'], function (){

 	 	
/**
* WITH RESOURCE
*/


Route::resource('logos', 'LogosController');
Route::resource('socials', 'SocialysController');
Route::resource('portfolios', 'PortfoliosController');


//Route::get('portfolioRestore', 'PortfoliosController@restore')->name('restore');
Route::prefix('portfolios/{portfolio}')->group(function () {
	//Route::resource('pagesMore', 'PagesMoreController');
	Route::get('topic', 'PagesController@topic')->name('topic');
	Route::resource('pages', 'PagesController');
	Route::resource('socialAlls', 'SocialAllsController');
	Route::resource('portfolioAlls', 'PortfolioAllsController');
Route::resource('portfolios1', 'Portfolios1Controller');
Route::resource('portfolios2', 'Portfolios2Controller');
Route::resource('portfolios3', 'Portfolios3Controller');
Route::resource('portfolios4', 'Portfolios4Controller');
Route::resource('portfolios5', 'Portfolios5Controller');
Route::resource('peopleAlls', 'PeopleAllsController');
Route::prefix('peopleAlls/{peopleAll}')->group(function () {
	Route::resource('socialPeopleAlls', 'SocialPeopleAllsController');	    
	 
});
	
});
//Route::resource('services', 'ServicesController');
Route::resource('peoples', 'PeoplesController');
Route::prefix('peoples/{people}')->group(function () {
	Route::resource('socialPeoples', 'SocialPeoplesController');	    
	 
});
});	
