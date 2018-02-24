<?php

namespace App\Http\Controllers;


use App\Portfolio;
use App\Page;
//staticaly ::
use Universal;
use Carbon;
//use Request;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests;
use Validator;
use File;
use Storage;
//use Illuminate\Http\UploadedFile;
//use Illuminate\Http\File;
//use Illuminate\Support\Facades\Storage;

// use App\Http\Requests\TemplateRequest;
// use App\Template;
// use App\Compaign;
// use Illuminate\Http\Request;
// use App\Owned;
// use Illuminate\Support\Facades\Auth;


class PagesController extends Controller
{
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Page $page, Portfolio $portfolio)
    {
        //
        $pages = $portfolio->pages;
        return view('admin.pages.index', compact('portfolio'));
        
    }  
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function topic(Page $page, Portfolio $portfolio)
    {
        $pages = $portfolio->pages;

        return view('admin.pages.topic', compact('portfolio'));
        

   // public function topic($alias){
        // if(!$alias){
        //     abort(404);
        // }
        // if(view()->exists('pages.page')){
        //     $portfolio->pages = Portfolio::where('alias',strip_tags($alias))->first();
            
        //     $data = [
        //         'title' => $portfolio->name,
        //         'portfolio' => $portfolio

        //     ];
        //     return  view('pages.page', $data);
        // }else{
        //     abort(404);
        
        // }

    
        //
        // $pages = $portfolio->pages;
        //return view('admin.pages.topic', compact('portfolio'));
        // //[
        //  // 'pages' => Page::orderBy('created_at', 'desc')->paginate(10)
        //   //]
        //   );

        //**************************************
     //    $pages = Page::all();//$portfolio->pages;//Page::all(); except('_token')
     //    $portfolios = Portfolio::all();//get(array('id','name', 'filter', 'images', 'link' ));
     //    //$portfolio = Portfolio::find($id);
     //    //$services = Service::where('id','<',20)->get();
     //    $peoples = People::all();//take(3)->get();

        
     //    $tags = DB::table('portfolios')->distinct()->pluck('filter');
     // //dd($socials);
     //    $socials = Socialy::take(24)->get();
     //    //dd($socials);
     //    $socialPeoples = SocialPeople::all();//take(5)->get();
     //    $logos = Logo::take(1)->get();
     //    //MENU
     //    $menu = array();
     //    //from db
     //    foreach ($pages as $page) {
     //        # code...
     //        $item = array('title'=>$page->name, 'alias'=>$page->alias);
     //        //alias or link
     //        array_push($menu, $item);
     //    }
     //    //dd($menu);
     //    //from hand
     //    $item =array('title'=>'Services','alias'=>'service');
     //    array_push($menu, $item);
     //    $item =array('title'=>'Portfolio','alias'=>'Portfolio');
     //    array_push($menu, $item);
     //    $item =array('title'=>'Team','alias'=>'team');
     //    array_push($menu, $item);
     //    $item =array('title'=>'Contacts','alias'=>'contact');
     //    array_push($menu, $item);
     //    //dd($menu);
     //    return view('admin.pages.topic', array(
     //        'menu' => $menu,
     //        'pages' => $pages,
     //        //'services' => $services,
     //        'portfolios' => $portfolios,
     //        //'portfolio' => $portfolio,
     //        'peoples' => $peoples,
     //        'tags'=> $tags,
     //        'socials' => $socials,
     //        'socialPeoples' => $socialPeoples,
        
     //        'logos'=> $logos,
     //    ));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Page $page, Portfolio $portfolio)
    {
        //
        return view('admin.pages.create', compact('page', 'portfolio'));
    //     if(view()->exists('admin.pages.create')){
            
    //         $data = [
    //             'title' => 'New Page'

    //         ];
    //         return  view('admin.pages.create', $data);
    //         }
    //         abort(404);
    // }
    }
// public function uploadFile($images, $audios, $videos)

//     {

//         if(($images == null){ return; }
//         $this->removeImage();
//         $fileName = str_random(10) . '.' . $images->extention();
//         $images->storeAs('/assets/img', $fileName);
//         $this->$images = $fileName;
//         $this->save();
//     }


    /**
     * Store a newly created resource in storage.
     * @param  string $portfolio
     * @param  string $page
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request, Page $page, Portfolio $portfolio)//, Page $page)
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
             'alias' => 'required|max:255|unique:pages1',
             'images' => 'required|unique:pages1'    
        
         ], $messages);
         if($validator->fails()){
             return redirect()->route('pages.create', compact('portfolio', 'page'))->withErrors($validator)->withInput();

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

         $portfolio->pages()->create($input);
//dd($portfolio); 

         return redirect()->route('pages.index', compact('portfolio', 'page'))->with('status', 'Page added');



// if (Request::hasFile('images')) :
//     $image = Request::file('images');
//     $uniqueName =  uniqid('/assets/img', $image->getClientOriginalName());
//     Request::file('images')->move(public_path('/assets/img'), $uniqueName);
// endif;
//if($request->file('images')){
//time().'.'.
// $portfolio->pages()->create($request->except('_token'));
// fileUPload();
  // $FileName = Page::file('images')->getClientOriginalName(); $FileDestinationPath = public_path('') .'/assets/img/'.$FileName; 




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

  

// public function handle($request, Closure $next)
// {
//     $max = $this->getPostMaxSize();

//     if ($max > 0 && $request->server('CONTENT_LENGTH') > $max) {
//         // Check for route1
//         // and do something

//         // Check for route2
//         // and do something else

//         // Fallback for other routes
//         return redirect()->back();
//     }

//     return $next($request);
// }




 
    // @if (count($errors) > 0)
    //     <ul>
    //         @foreach ($errors->all() as $error)
    //             <li>{{ $error }}</li>
    //         @endforeach
    //     </ul>
    // @endif
 
    // <form action="/upload" method="post" enctype="multipart/form-data">
    // ...
//php artisan make:request UploadRequest********************
// return [
//     'name' => 'required',
//     'photo' => 'image|mimes:jpeg,bmp,png|size:2000'
// ];


//     public function rules()
//     {
//         $rules = [
//             'name' => 'required'
//         ];
//         $photos = count($this->input('photos'));
//         foreach(range(0, $photos) as $index) {
//             $rules['photos.' . $index] = 'image|mimes:jpeg,bmp,png|max:2000';
//         }

//         return $rules;
//     }*****************************************

       
    }

    /**
     * Display the specified resource.
     * TODO: $id -> $page
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio, Page $page)
    {
        //
        return view('admin.pages.show', compact('page', 'portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio, Page $page)
    {
        //

         
        return view('admin.pages.edit', compact('page', 'portfolio'));

    }

    /**
     * Update the specified resource in storage.
     * @param  Portfolio  $portfolio
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio, Page $page)
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
        //      'alias' => 'required|max:255|unique:pages1,alias,'.$page['id'],
        //      'text' => 'required|max:255'
        //      //, 'images' => 'required|unique:pages1,images,'.$page['id']
             
        //  ], $messages);
        //  if($validator->fails()){
        //      return redirect()->route('pages.create', compact('portfolio', 'page' => ['id']))->withErrors($validator)->withInput();
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
        $portfolio->pages()->update($input);
        return redirect()->route('pages.index', compact('portfolio'))->with('status', 'Page edited');

        //$page->update($request->except('_token'));//($request->all());
        
        //return redirect()->route('pages.index')->with('status', 'Page edited');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Portfolio  $portfolio
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio, Page $page)
    {
        //
        $page->delete();

        return redirect()->route('pages.index', compact('portfolio'));
    }
}
