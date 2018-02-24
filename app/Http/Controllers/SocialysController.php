<?php

namespace App\Http\Controllers;

use App\Socialy;
use App\People;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use File;
use Storage;
use Illuminate\Http\UploadedFile;

class SocialysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Socialy $social)
    {
        //
        return view('admin.socials.index', [
          'socials' => Socialy::orderBy('created_at', 'desc')->paginate(10)
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
        return view('admin.socials.create', compact('social'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request, Socialy $social)//, People $people)
    {
        //dd($request);

        $social->create($request->except('_token'));

        return redirect()->route('socials.index', compact('social'))->with('status', 'Socials added');
    }

     /**
     * Display the specified resource.
     * TODO: $id -> $social
     * @param  \App\Socialy  $social
     * @return \Illuminate\Http\Response
     */
    public function show(Socialy $social)
    {
        //
        return view('admin.socials.show', compact('social'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Socialy  $social
     * @return \Illuminate\Http\Response
     */
    public function edit(Socialy $social)
    {
        //
        return view('admin.socials.edit', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Socialy  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Socialy $social)
    {
        //
        $social->update($request->except('_token'));//($request->all());
        return redirect()->route('socials.index')->with('status', 'Page edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(Socialy $social)
    {
        //
        $social->delete();

        return redirect()->route('socials.index');
    }
}