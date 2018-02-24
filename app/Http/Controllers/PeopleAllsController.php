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
class PeopleAllsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PeopleAll $peopleAll, Portfolio $portfolio, SocialPeopleAll $socialPeopleAll)
    {
        //
        $peopleAlls = $portfolio->peopleAlls;
        return view('admin.peopleAlls.index', array('portfolio' => $portfolio, 'peopleAlls' => PeopleAll::orderBy('created_at', 'desc')->paginate(10)));
        
    } 
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PeopleAll $peopleAll, Portfolio $portfolio)
    {
        //
        return view('admin.peopleAlls.create', compact('peopleAll', 'portfolio'));

    }
    /**
     * Store a newly created resource in storage.
     * @param  string $portfolio
     * @param  string $peopleAll
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request, PeopleAll $peopleAll, Portfolio $portfolio)
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
            'images' => 'required|unique:people_alls'    
        
         ], $messages);
         if($validator->fails()){
             return redirect()->route('peopleAlls.create', compact('portfolio', 'peopleAll'))->withErrors($validator)->withInput();

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

         $portfolio->peopleAlls()->create($input);
//dd($portfolio); 

         return redirect()->route('peopleAlls.index', compact('portfolio', 'peopleAll'))->with('status', 'PeopleAll added');
     }

    /**
     * Display the specified resource.
     * TODO: $id -> $peopleAll
     * @param  \App\PeopleAll  $peopleAll
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio, PeopleAll $peopleAll)
    {
        //
        return view('admin.peopleAlls.show', compact('peopleAll', 'portfolio', 'socialPeopleAll'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio, PeopleAll $peopleAll)
    {
        //

         
        return view('admin.peopleAlls.edit', compact('peopleAll', 'portfolio'));

    }

    /**
     * Update the specified resource in storage.
     * @param  Portfolio  $portfolio
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PeopleAll  $peopleAll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio, PeopleAll $peopleAll)
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
        //      'alias' => 'required|max:255|unique:pages1,alias,'.$peopleAll['id'],
        //      'text' => 'required|max:255'
        //      //, 'images' => 'required|unique:pages1,images,'.$peopleAll['id']
             
        //  ], $messages);
        //  if($validator->fails()){
        //      return redirect()->route('peopleAlls.create', compact('portfolio', 'peopleAll' => ['id']))->withErrors($validator)->withInput();
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
        $portfolio->peopleAlls()->update($input);
        return redirect()->route('peopleAlls.index', compact('portfolio'))->with('status', 'PeopleAll edited');

        //$peopleAll->update($request->except('_token'));//($request->all());
        
        //return redirect()->route('pages.index')->with('status', 'PeopleAll edited');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Portfolio  $portfolio
     * @param  \App\PeopleAll  $peopleAll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio, PeopleAll $peopleAll)
    {
        //
        $peopleAll->delete();

        return redirect()->route('peopleAlls.index', compact('portfolio'));
    }         
}
