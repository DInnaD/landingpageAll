<?php

namespace App\Http\Controllers;

use App\SocialPeople;
use App\People;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Http\UploadedFile;

//use Illuminate\Support\Facades\Request;

class PeoplesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(People $people, SocialPeople $socialPeople)
    {
        
        return view('admin.peoples.index', [
          'peoples' => People::orderBy('created_at', 'desc')->paginate(10)
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
        return view('admin.peoples.create', compact('people'));
    }
private function saveImage(Request $request)
    {

        if ($request->hasFile('images')) {

            $file = $request->file('images'); // ->isValid()

            $fileNameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();

            $fileNameToStore = $filename .'.' . $extension;
            //$request->merge(['images' => $fileNameToStore]);

            $file->storeAs('assets/img', $fileNameToStore);

        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $request->images = $fileNameToStore;

        return $request; // $request = $this->saveImage($request);

        // $FileName = Portfolio::file('images')->getClientOriginalName(); $FileDestinationPath = public_path('') .'/assets/img/'.$FileName; 


  // dd($FileName);   
 // $fileName = $request->images->getClientOriginalExtension();
 //  $request->images->move(public_path('/assets/img'), $fileName);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  string $people
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request, People $people)//, File $file)//, People $people)
    {
        if($request->isMethod('post')){
        //dd($request);
            //object $request call to array if I need except('_token')
            $input = $request->all();



         $messages = [
           
             'required' => 'Field :attribute required',
             'unique' => 'Field :attribute unique'
         ];
         
         $validator = Validator::make($input, [
            
            'name' => 'required|max:255',
            'images' => 'required|unique:peoples1'
             
         ], $messages);
         if($validator->fails()){
             return redirect()->route('peoples.create', compact('people'))->withErrors($validator)->withInput();

        }

        if($request->hasFile('images')){
        // new of obj uploadedFile
        $file = $request->file('images');
       // dd($file);
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
        
      
        $people->create($input);//except('_token'));
        return redirect()->route('peoples.index', compact('people'))->with('status', 'Peoples added');

        //*********************************

//********************************
//  $fileName = $request->images;//->getClientOriginalName();
// // //dd($fileName); //engl3.png
//  $path = public_path('/assets/img');
// //  $tmpfile = 
//   $request->images->storeAs('path', $fileName);// (public_path('/assets/img'), $fileName);
// //dd($path); //"/var/www/laravel2/public/assets/img"
// dd($request);
  //$portfolio->create($request->except('_token'));
        //*********************************
        // $disk = \Storage::disk('local');
       
        // $files = $disk->allFiles();
        // print "<div>";
        // foreach ($files as $file) {
        //     $modified = date(DATE_RFC2822, $disk->lastModified($file));
        //     $size = $disk->size($file);
        //     $type = $disk->mimeType($file);
        //     print "<li> $file : $modified ($size Bytes) : $type</li>";
        // }
        // print "</div>";
        // dd($file);
        
        
 //********************************** 
 
    }

     /**
     * Display the specified resource.
     * TODO: $id -> $people
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function show(People $people, SocialPeople $socialPeople)
    {
        //
        return view('admin.peoples.show', compact('people', 'socialPeople'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function edit(People $people)
    {
        //
        return view('admin.peoples.edit', compact('people'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, People $people)
    {
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
             'images' => 'max:255'//|unique:peoples1,images,'.$input['_token']
             
         ], $messages);
         if($validator->fails()){
             return redirect()->route('peoples.edit', ['people' => $people['id']])->withErrors($validator)->withInput();

        }

        if($request->hasFile('images')){
        // new of obj uploadedFile
        $file = $request->file('images');
       // dd($file);
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
        $people->update($input);
        return redirect()->route('peoples.index', compact('people'))->with('status', 'Page edited');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function destroy(People $people)
    {
        //
        $people->delete();

        return redirect()->route('peoples.index');
    }
}
