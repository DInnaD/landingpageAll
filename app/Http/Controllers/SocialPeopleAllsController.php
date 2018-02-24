<?php

namespace App\Http\Controllers;

 use App\Portfolio;
// use App\PortfolioAll;
// use App\Page;
 use App\PeopleAll;
// use App\Service;

use App\SocialPeopleAll;
//use App\Logo; as image of page
//use App\SocialAll;

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

class SocialPeopleAllsController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SocialPeopleAll $socialPeopleAll, Portfolio $portfolio, PeopleAll $peopleAll)
    {
         //$peopleAlls = $portfolio->peopleAlls =
          $socialPeopleAlls = $peopleAll->socialPeopleAlls;
        
        return view('admin.socialPeopleAlls.index', compact('portfolio', 'peopleAll'));
        
        
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SocialPeopleAll $socialPeopleAll, Portfolio $portfolio, PeopleAll $peopleAll)
    {
        //
        return view('admin.socialPeopleAlls.create', compact('socialPeopleAll', 'portfolio', 'peopleAll'));
    }

    /**
     * Store a newly created resource in storage.
     * @param string $portfolio
     * @param string $peopleAll
     * @param string $socialPeopleAll
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request, SocialPeopleAll $socialPeopleAll, Portfolio $portfolio, PeopleAll $peopleAll )//, People $people)
    {
        //dd($request);

        $peopleAll->socialPeopleAlls()->create($request->all());

        return redirect()->route('socialPeopleAlls.index', compact('socialPeopleAll',  'portfolio', 'peopleAll'))->with('status', 'SocialPeopleAlls added');
    }

     /**
     * Display the specified resource.
     * TODO: $id -> $socialPeople
     * @param  \App\SocialPeople  $socialPeople
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio, PeopleAll $peopleAll, SocialPeopleAll $socialPeopleAll)
    {
        //
        return view('admin.socialPeopleAlls.show', compact('portfolio', 'peopleAll', 'socialPeopleAll'));
    }

     /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio, PeopleAll $peopleAll, SocialPeopleAll $socialPeopleAll)
    {
        //
        return view('admin.socialPeopleAlls.edit', compact('portfolio', 'peopleAll', 'socialPeopleAll'));
    }

    /**
     * Update the specified resource in storage.
     * @param Portfolio $portfolio
     * @param PeopleAll $peopleAll
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio, PeopleAll $peopleAll, SocialPeopleAll $socialPeopleAll)
    {

        //
        $peopleAll->socialPeopleAlls()->update($request->except('_token'));

        return redirect()->route('socialPeopleAlls.index', compact('portfolio', 'peopleAll', 'socialPeopleAll'))->with('status', 'SocialPeopleAlls edited');
       
    }

    /**
     * Remove the specified resource from storage.
     * @param  Portfolio  $portfolio
     * @param  PeopleAll  $peopleAll
     * @param  SocialPeopleAll  $socialPeopleAll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio, PeopleAll $peopleAll, SocialPeopleAll $socialPeopleAll)
    {
        //
        $socialPeopleAll->delete();

        return redirect()->route('socialPeopleAlls.index', compact('portfolio','peopleAll'));
    }
}
