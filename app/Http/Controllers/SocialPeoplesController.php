<?php

namespace App\Http\Controllers;

use App\SocialPeople;
use App\People;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Mail;
use DB;
use Validator;
use File;
use Storage;

class SocialPeoplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SocialPeople $socialPeople, People $people)
    {
        $socialPeoples = $people->socialPeoples;
        return view('admin.socialPeoples.index', compact('people'));
        
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SocialPeople $socialPeople, People $people)
    {
        //
        return view('admin.socialPeoples.create', compact('socialPeople', 'people'));
    }

    /**
     * Store a newly created resource in storage.
     * @param People $people
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request, SocialPeople $socialPeople, People $people, File $file)//, People $people)
    {
        //dd($request);

        $people->socialPeoples()->create($request->except('_token'));

        return redirect()->route('socialPeoples.index', compact('socialPeople', 'people'))->with('status', 'SocialPeoples added');
    }

     /**
     * Display the specified resource.
     * TODO: $id -> $socialPeople
     * @param  \App\SocialPeople  $socialPeople
     * @return \Illuminate\Http\Response
     */
    public function show(People $people, SocialPeople $socialPeople)
    {
        //
        return view('admin.socialPeoples.show', compact('socialPeople', 'people'));
    }

     /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(People $people, SocialPeople $socialPeople)
    {
        //
        return view('admin.socialPeoples.edit', compact('people', 'socialPeople'));
    }

    /**
     * Update the specified resource in storage.
     * @param People $people
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, People $people, SocialPeople $socialPeople, File $file)
    {

        //
        $people->socialPeoples()->update($request->except('_token'));

        return redirect()->route('socialPeoples.index', compact('people'))->with('status', 'SocialPeoples edited');
       
    }

    /**
     * Remove the specified resource from storage.
     * @param  People  $people
     * @param  SocialPeople  $socialPeople
     * @return \Illuminate\Http\Response
     */
    public function destroy(People $people, SocialPeople $socialPeople)
    {
        //
        $socialPeople->delete();

        return redirect()->route('socialPeoples.index', compact('people'));
    }
}
