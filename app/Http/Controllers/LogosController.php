<?php

namespace App\Http\Controllers;

use App\Logo;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\UploadedFile;
use Validator;
use File;
use Storage;

class LogosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Logo $logo)
    {
        //
        return view('admin.logos.index', [
          'logos' => Logo::orderBy('created_at', 'desc')->paginate(10)
          ]);
        
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.logos.create', compact('logo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request, Logo $logo)//, People $people)
    {
         if($request->isMethod('post')){
        //dd($request);
            //object $request call to array if I need except('_token')
            $input = $request->all();

//dd($input);

// if($validator->fails()){
//              return redirect()->route('portfolios.create', compact('portfolio'))->withErrors($validator)->withInput();

//         }


         $messages = [
           
             'required' => 'Field :attribute required',
             'unique' => 'Field :attribute unique'
         ];
         
         $validator = Validator::make($input, [
            
             'name' => 'required|max:255',
             //'filter' => 'required|unique:portfolios|max:255',
             'images' => 'required|unique:logos1'
             
         ], $messages);
         if($validator->fails()){
             return redirect()->route('logos.create', compact('logo'))->withErrors($validator)->withInput();

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
        $logo->create($input);
//dd($logo);
        return redirect()->route('logos.index', compact('logo'))->with('status', 'logo added');

//         //dd($request);
//         if($request->isMethod('post')){
//         //dd($request);
//             //object $request call to array if I need except('_token')
//         $input = $request->all();    

// //dd($input);

// // if($validator->fails()){
// //              return redirect()->route('portfolios.create', compact('portfolio'))->withErrors($validator)->withInput();

// //         }


//          $messages = [
           
//              'required' => 'Field :attribute required',
//              'unique' => 'Field :attribute unique'
//          ];
         
//          $validator = Validator::make($input, [
            
//              'name' => 'required|max:255',
//              //'favicons' => 'required|max:255',
//              'images' => 'required|unique:logos1|max:255'
             
//          ], $messages);
//          if($validator->fails()){
//              return redirect()->route('logos.create', compact('logo'))->withErrors($validator)->withInput();

//         }

//         if($request->hasFile(['images', 'favicons'])){
//         // new of obj uploadedFile
//         $file1 = $request->file(['images']);
//         //$file2 = $request->file(['favicons']);

//         //dd($file1);
//         //with obj 'images' already
//         //dd($input);
//         //but we need clean it dd($input); and put here filerealname
//         $input['images'] = $file1->getClientOriginalName();  //получение оригинального имени файла
//         //$input['favicons'] = $file2->getClientOriginalName();           
//         //dd($input);//the same
        
//         $file1->move(public_path().'/assets/img', $input['images']);  //копирование файла на сервер
//         //$file2->move(public_path().'/assets/img', $input['favicons']);
//         }
//     //dd($input);//the same
     
//     }
    

//         $logo->create($input);
//      //dd($logo);
//         //dd($input);

//          return redirect()->route('logos.index', compact('logo'))->with('status', 'Logo added');


    }

     /**
     * Display the specified resource.
     * TODO: $id -> $logo
     * @param  \App\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function show(Logo $logo)
    {
        //
        return view('admin.logos.show', compact('logo'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function edit(Logo $logo)
    {
        //
        return view('admin.logos.edit', compact('logo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logo $logo)
    {
        //
        //dd($request);
        $input = $request->all();
        if($request->isMethod('put')){
        //dd($request);
            //object $request call to array if I need except('_token')
            
         


         $messages = [
           
             'required' => 'Field :attribute required',
             'unique' => 'Field :attribute unique'
         ];
         
         $validator = Validator::make($input, [
            
             'name' => 'required|max:255',
             //'favicons' => 'required|max:255',
             'images' => 'max:255|unique:logos1,images,'.$logo['id']
             
         ], $messages);
         if($validator->fails()){
             return redirect()->route('logos.edit', ['logo',$logo['id']])->withErrors($validator)->withInput();

         }

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
           // копирование файла на сервер
       $input['images'] = $input['old_images'];  //получение оригинального имени файла

       }

        
        //$portfolio->fill($input);
        
    //dd($input);//the same
    }
        unset($input['old_images']);
        $logo->update($input);
        
        return redirect()->route('logos.index',compact('logo'))->with('status', 'Page edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logo $logo)
    {
        //
        $logo->delete();

        return redirect()->route('logos.index');
    }
}
