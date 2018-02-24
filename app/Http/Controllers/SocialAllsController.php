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

class SocialAllsController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SocialAll $socialAll, Portfolio $portfolio)
    {
        //
        $socialAlls = $portfolio->socialAlls;
        return view('admin.socialAlls.index', compact('portfolio'));
        
    } 
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SocialAll $socialAll, Portfolio $portfolio)
    {
        //
        return view('admin.socialAlls.create', compact('socialAll', 'portfolio'));

    }
    /**
     * Store a newly created resource in storage.
     * @param  string $portfolio
     * @param  string $socialAll
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request, SocialAll $socialAll, Portfolio $portfolio)
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
             'link' => 'required|max:255|unique:social_alls',
             'callBack' => 'required|max:255'    
        
         ], $messages);
         if($validator->fails()){
             return redirect()->route('socialAlls.create', compact('portfolio', 'page'))->withErrors($validator)->withInput();

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

         $portfolio->socialAlls()->create($input);
//dd($portfolio); 

         return redirect()->route('socialAlls.index', compact('portfolio', 'socialAll'))->with('status', 'SocialAll added');
     }

    /**
     * Display the specified resource.
     * TODO: $id -> $socialAll
     * @param  \App\SocialAll  $socialAll
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio, SocialAll $socialAll)
    {
        //
        return view('admin.socialAlls.show', compact('socialAll', 'portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio, SocialAll $socialAll)
    {
        //

         
        return view('admin.peopleAlls.edit', compact('socialAll', 'portfolio'));

    }

    /**
     * Update the specified resource in storage.
     * @param  Portfolio  $portfolio
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SocialAll  $socialAll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio, SocialAll $socialAll)
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
        //      'alias' => 'required|max:255|unique:pages1,alias,'.$socialAll['id'],
        //      'text' => 'required|max:255'
        //      //, 'images' => 'required|unique:pages1,images,'.$socialAll['id']
             
        //  ], $messages);
        //  if($validator->fails()){
        //      return redirect()->route('pages.create', compact('portfolio', 'socialAll' => ['id']))->withErrors($validator)->withInput();
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

        
    }



        unset($input['old_images']);
        $portfolio->socialAlls()->update($input);
        return redirect()->route('socialAlls.index', compact('portfolio'))->with('status', 'SocialAll edited');

    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Portfolio  $portfolio
     * @param  \App\SocialAll  $socialAll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio, SocialAll $socialAll)
    {
        //
        $socialAll->delete();

        return redirect()->route('socialAlls.index', compact('portfolio'));
    } 
}
