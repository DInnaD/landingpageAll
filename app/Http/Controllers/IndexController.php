<?php

namespace App\Http\Controllers;

//use App\Index;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\People;
use App\Portfolio;
use App\Service;
use App\Page;
use App\Index;
use App\SocialPeople;
use App\Logo;
use App\Socialy;
use App\PeopleAll;
use App\PortfolioAll;
use App\SocialPeopleAll;
use App\SocialAll;

use Mail;
use DB;
use Validator;
use File;
use Storage;
use Illuminate\Http\UploadedFile;
//use App\Mail\Welcome;//php artisan make:mail Welcome --markdown=emails.welcome

//use App\Http\Requests\IndexRequest;

class IndexController extends Controller
{
    public function execute(Request $request)
    {//{!! Html::image('assets/img/'.$page->images,'',['class' => 'zoomIn wow animated']) !!}
    //
    if($request->isMethod('post')){
// $this->validate($request, [

//       'email' => 'required|email',
//       'subject' => 'required|min:3',
//       'message' => 'required|min:10'
//     ]);

//     $data = array(
//       'email' => $request->email,
//       'subject' => $request->subject,
//       'mailbody' => $request->message
//     );

//     Mail::send('emails.contact', $data, function($message) use ($data) {
//       $message->from($data['email']);
//       $message->to('username@gmail.com');
//       $message->subject($data['subject']);
//     });
//   }
        $messages = [

            'required' => "Fill full :attribute is required",
            'email' => "Fill full :attribute is the same with email address"


        ];


//$post = 
        $this->validate($request,[

            'name' => 'required|max:255',
            'email' => 'required|email',
            'text' => 'required'

            ], $messages);
    //     $post = request()->validate([
    //     'title' => 'required',
    //     'body' => 'required',
    //     'notRequiredField' => '',
    // ]);


// return Post::create($post); return Post::create(request()->all());
       //dump($request);
        $data = $request->all();//$post
 //       $data = array(
//       'email' => $request->name,
//       'subject' => $request->email,
//       'mailbody' => $request->text
//     );
        //dump($data);
        //mail sent
        $result = 
        //Mail::to($receiverAddress)->send(new Welcome);
        
        Mail::send('site.email', ['data'=>$data], function($message) use ($data) {

            $mail_sender = $data['email'];// eto data user after register

            $mail_admin = env('MAIL_ADMIN');//USER_NAME');//here is all email adress from mailer
            $message->from($mail_sender, $data['name']);

            $message->to($mail_admin, 'Mr. Admin')->subject('Question');
            
            
            
//Send Mail  +++++++na mailer 100%   
// Mail::send('site.email', array('data' => 'data'), function($message) use ($data)
// {
   // $message->to($data['email'], 'Sender Name')->subject('Welcome!', $data['email'], $data['name'],  $data['text']);
            
 
         
            

        });
        if($result){

                return redirect()->route('home')->with('status', 'Email is send');
            }
        //dd(error_get_last())

    }
        $pages = Page::all();
        //$pages = $portfolio->pages;
        $portfolios = Portfolio::all();//get(array('id', 'name', 'filter', 'images', 'link' ));
        //$services = Service::where('id','<',20)->get();
        $peoples = People::all();//take(3)->get();

        
        $tags = DB::table('portfolios')->distinct()->pluck('filter');
     //dd($socials);
        $socials = Socialy::take(24)->get();

        //dd($socials);
        $socialPeoples = SocialPeople::all();//take(5)->get();
        

        
        $portfolioAlls = PortfolioAll::all();
        $services = Service::where('id','<',20)->get();
        $peopleAlls = PeopleAll::all();
        $tagMores = DB::table('portfolio_alls')->distinct()->pluck('filter');
        $socialAlls = SocialAll::take(24)->get();
        $socialPeopleAlls = SocialPeopleAll::all();
        $logos = Logo::take(1)->get();
        //MENU
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
        //dd($menu);
        return view('site.index', array(
            //'menu' => $menu,
            'pages' => $pages,
            //'services' => $services,
            'portfolios' => $portfolios,
            'peoples' => $peoples,
            'tags'=> $tags,
            'socials' => $socials,
            'socialPeoples' => $socialPeoples,
            'logos'=> $logos,
            'services' => $services,
            'portfolioAlls' => $portfolioAlls,
            'peopleAlls' => $peopleAlls,
            'tagMores'=> $tagMores,
            'socialAlls' => $socialAlls,
            'socialPeoples' => $socialPeopleAlls,
        ));// ne k maketu ('layouts.site'); a k promegutochnomu
    }
    /**
     * Display the specified resource.
     * TODO: $id -> $page
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    //     public function executeExShow(Page $page, Portfolio $portfolio)
    // {
    //     $pages = $portfolio->pages;
    //     return view('siteEx.index', compact('portfolio'));
       

    // }
 

     /**
     * Display a listing of the resource.
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    // public function index(Request  $request)
    // {
        
    //    // return view('wordbook');
    // }
   

  
    // public function getData()
    // {
    //     return Index::orderBy('name','ASC')->get();
    // }
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    //    // return view('wordbook');
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     return view('wordbook.create', compact('wordbook'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request, Index $wordbook)
    // {
    //     //dd($request);

    //     $wordbook->create($request->except('_token'));

    //     return redirect()->route('wordbook.index', compact('wordbook'))->with('status', 'Word added');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Index  $wordbook
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Index $wordbook)
    // {
    //     //
    //     return view('wordbook.show', compact('wordbook'));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Index  $wordbook
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Index $wordbook)
    // {
    //     //
    //     return view('wordbook.update', compact('wordbook'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Index  $wordbook
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Index $wordbook)
    // {
    //     //
    //     $wordbook->update($request->except('_token'));

    //     return redirect()->route('wordbook.index', compact('wordbook'))->with('status', 'Word edit');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Index  $wordbook
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Index $wordbook)
    // {
    //     //
    //     $wordbook->delete();

    //     return redirect()->route('wordbook.index');
    // }
}
