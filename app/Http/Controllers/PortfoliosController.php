<?php

namespace App\Http\Controllers;

use App\Portfolio;
use App\Page;
use App\People;
use App\Service;
use App\Index;
use App\SocialPeople;
use App\Logo;
use App\Socialy;
use App\PortfolioAll;
use App\PeopleAll;
//use App\SocialPeopleAll;
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

class PortfoliosController extends Controller
{
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function topic(Portfolio $portfolio, Page $page)
    {

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
        $pages = Page::all();//$portfolio->pages;//Page::all(); except('_token')
        $portfolios = Portfolio::all();//get(array('id','name', 'filter', 'images', 'link' ));
        //$portfolio = Portfolio::find($id);
        //$services = Service::where('id','<',20)->get();
        $peoples = People::all();//take(3)->get();

        
        $tags = DB::table('portfolios')->distinct()->pluck('filter');
     //dd($socials);
        $socials = Socialy::take(24)->get();
        //dd($socials);
        $socialPeoples = SocialPeople::all();//take(5)->get();
        $logos = Logo::take(1)->get();
        //MENU
        $menu = array();
        //from db
        foreach ($pages as $page) {
            # code...
            $item = array('title'=>$page->name, 'alias'=>$page->alias);
            //alias or link
            array_push($menu, $item);
        }
        //dd($menu);
        //from hand
        $item =array('title'=>'Services','alias'=>'service');
        array_push($menu, $item);
        $item =array('title'=>'Portfolio','alias'=>'Portfolio');
        array_push($menu, $item);
        $item =array('title'=>'Team','alias'=>'team');
        array_push($menu, $item);
        $item =array('title'=>'Contacts','alias'=>'contact');
        array_push($menu, $item);
        //dd($menu);
        return view('admin.pages.topic', array(
            'menu' => $menu,
            'pages' => $pages,
            //'services' => $services,
            'portfolios' => $portfolios,
            //'portfolio' => $portfolio,
            'peoples' => $peoples,
            'tags'=> $tags,
            'socials' => $socials,
            'socialPeoples' => $socialPeoples,
        
            'logos'=> $logos,
        ));
        
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Portfolio $portfolio, Page $page, PortfolioAll $portfolioAll, PeopleAll $peopleAll, SocialAll $socialAll)
    {
        //
        return view('admin.portfolios.index', [
          'portfolios' => Portfolio::orderBy('created_at', 'desc')->paginate(10)
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
        return view('admin.portfolios.create', compact('portfolio'));
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
 $path = public_path('/assets/img');
            $file->storeAs('path', $fileNameToStore);

        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $request->images = $fileNameToStore;

        return $request; // $request = $this->saveImage($request);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  string $portfolio
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request, Portfolio $portfolio)//, Portfolio $portfolio)
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
             'filter' => 'required|max:255',
             'images' => 'required|unique:portfolios'
             
         ], $messages);
         if($validator->fails()){
             return redirect()->route('portfolios.create', compact('portfolio'))->withErrors($validator)->withInput();

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
         //Image::make($poster)
        $file->resize(356,265)->move(public_path().'/assets/img', $input['images']);  //копирование файла на сервер
        }
    //dd($input);//the same
    }
        $portfolio->create($input);

        return redirect()->route('portfolios.index', compact('portfolio'))->with('status', 'Portfolio added');
    }

     /**
     * Display the specified resource.
     * TODO: $id -> $portfolio
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio, Page $page, PortfolioAll $portfolioAll, PeopleAll $peopleAll, SocialAll $socialAll)
    {
        //

        return view('admin.portfolios.show', compact('portfolio', 'page', 'portfolioAll', 'peopleAll', 'socialAll'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        //
       // $portfolio = Portfolio::find('id');
        //dd($portfolio);

        return view('admin.portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        //
         $input = $request->all();
         //dd($input);
        if($request->isMethod('put')){
           
            //object $request call to array if I need except('_token')
          
   //dd($request);         

 //dd($input); }
         $messages = [
           
             'required' => 'Field :attribute required',
             'unique' => 'Field :attribute unique'
         ];
         
         $validator = Validator::make($input, [
            
             'name' => 'required|max:255',
             'filter' => 'required|max:255',
             'images' => 'max:255'  //|unique:portfolios,images,'.$input['_token']
             
         ], $messages);
         if($validator->fails()){
             return redirect()->route('portfolios.edit', compact('portfolio',$portfolio['id']))->withErrors($validator)->withInput();

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
        //unset($input['old_images']);     
        //dd($input);//the same
        
        }else{
        //     //копирование файла на сервер
         $input['images'] = $input['old_images'];  //получение оригинального имени файла
         //unset($input['old_images']);
         }
         
//dd($portfolio);
        
//         //$portfolio->fill($input);
        
//     //dd($input);//the same

     }
        unset($input['old_images']);
//dd($input);
         $portfolio->update($input);
//dd($portfolio);        
         return redirect()->route('portfolios.index', compact('portfolio'))->with('status', 'Page edited');   
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        //
        $portfolio->delete();

        return redirect()->route('portfolios.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function restore(Portfolio $portfolio)
    {
        //
        $portfolio = Post::withTrashed()->find($id)->restore();

        return redirect()->route('portfolios.index');
    }
}
