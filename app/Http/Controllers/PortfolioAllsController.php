<?php

namespace App\Http\Controllers;

use App\Portfolio;
use App\PortfolioAll;
use App\Page;
use App\PeopleAll;
use App\Service;

use App\SocialPeopleAll;
//use App\Logo; as image of page
use App\SocialAll;

use Mail;
use DB;
use Validator;
use File;
use Storage;
use Illuminate\Http\UploadedFile;
//use App\Http\Requests\PortfolioRequest;
//use App\Http\Requests\SubscriberhRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Auth;
use App\User;
use App\Owned;


class PortfolioAllsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PortfolioAll $portfolioAll, Portfolio $portfolio)
    {
        //
        $portfolioAlls = $portfolio->portfolioAlls;
        return view('admin.portfolioAlls.index', compact('portfolio'));
        
    } 
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PortfolioAll $portfolioAll, Portfolio $portfolio)
    {
        //
        return view('admin.portfolioAlls.create', compact('portfolioAll', 'portfolio'));

    }
    /**
     * Store a newly created resource in storage.
     * @param  string $portfolio
     * @param  string $portfolioAll
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request, PortfolioAll $portfolioAll, Portfolio $portfolio)
    {
        
        if($request->isMethod('post')){
//         dd($request);
        $input = $request->all();
        //dd($input);
        
          $messages = [
           
             'required' => 'Field :attribute required',
             'unique' => 'Field :attribute unique'
         ];
         
         $validator = Validator::make($input, [
            
             'name' => 'required|max:255',
             'filter' => 'required|max:255|unique:portfolio_alls',
             'images' => 'required|unique:portfolio_alls'    
        
         ], $messages);
         if($validator->fails()){
             return redirect()->route('portfolios.create', compact('portfolio', 'portfolioAll'))->withErrors($validator)->withInput();

        }

        if($request->hasFile('images')){
        // new of obj uploadedFile
        $file = $request->file('images');
        //dd($file);
        //with obj 'images' already
        //dd($input);
        //but we need clean it dd($input); and put here filerealname
        $input['images'] = $file->getClientOriginalName();  //получение оригинального имени файла
//           
        //dd($input);//the same
        
        $file->move(public_path().'/assets/img', $input['images']);  //копирование файла на сервер
        }
    //dd($input);//the same
    }
            //dd($input); 

         $portfolio->portfolioAlls()->create($input);
//dd($portfolio); 

         return redirect()->route('portfolioAlls.index', compact('portfolio', 'portfolioAll'))->with('status', 'PortfolioAll added');
     }

    /**
     * Display the specified resource.
     * TODO: $id -> $portfolioAll
     * @param  \App\PortfolioAll  $portfolioAll
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio, PortfolioAll $portfolioAll)
    {
        //
        return view('admin.portfolioAlls.show', compact('portfolioAll', 'portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio, PortfolioAll $portfolioAll)
    {
        //

         
        return view('admin.portfolioAlls.edit', compact('portfolioAll', 'portfolio'));

    }

    /**
     * Update the specified resource in storage.
     * @param  Portfolio  $portfolio
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PeopleAll  $portfolioAll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio, PortfolioAll $portfolioAll)
    {
  //dd($request); 
          $input = $request->all();
  //dd($input);
          if($request->isMethod('put')){
  //dd($request);
            //object $request call to array if I need except('_token')
            
          

        // $messages = [
           
        //      'required' => 'Field :attribute required',
        //      'unique' => 'Field :attribute unique'
        //  ];
         
        //  $validator = Validator::make($input, [
           
        //      'name' => 'max:255',
        //      'alias' => 'required|max:255|unique:pages1,alias,'.$portfolioAll['id'],
        //      'text' => 'required|max:255'
        //      //, 'images' => 'required|unique:pages1,images,'.$portfolioAll['id']
             
        //  ], $messages);
        //  if($validator->fails()){
        //      return redirect()->route('pages.create', compact('portfolio', 'portfolioAll' => ['id']))->withErrors($validator)->withInput();
        // }

        if($request->hasFile('images')){
        // new of obj uploadedFile
        $file = $request->file('images');
        //dd($file);
        //with obj 'images' already
        //dd($input);
        //but we need clean it dd($input); and put here filerealname
        $file->move(public_path().'/assets/img', $file->getClientOriginalName());  //копирование файла на сервер
        $input['images'] = $file->getClientOriginalName();  //получение оригинального имени файла
//           
        //dd($input);//the same
        
        
        }else{
            //копирование файла на сервер
        $input['images'] = $input['old_images'];  //получение оригинального имени файла

        }

        
        //$portfolio->fill($input);
        
    //dd($input);//the same
    }



        unset($input['old_images']);
        $portfolio->portfolioAlls()->update($input);
        return redirect()->route('portfolioAlls.index', compact('portfolio'))->with('status', 'PortfolioAll edited');

        //$portfolioAll->update($request->except('_token'));//($request->all());
        
        //return redirect()->route('pages.index')->with('status', 'PortfolioAll edited');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Portfolio  $portfolio
     * @param  \App\PortfolioAll  $portfolioAll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio, PortfolioAll $portfolioAll)
    {
        //
        $portfolioAll->delete();

        return redirect()->route('peopleAlls.index', compact('portfolio'));
    } 
}

