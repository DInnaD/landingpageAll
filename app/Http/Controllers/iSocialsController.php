<?php

namespace App\Http\Controllers;

use App\Social;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
class SocialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Social $social)
    {
        //
        return view('admin.socials.index', [
          'socials' => Social::orderBy('created_at', 'desc')->paginate(10)
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
    public function store(Request  $request, Social $social)//, People $people)
    {
        //dd($request);

        $social->create($request->except('_token'));

        return redirect()->route('socials.index', compact('social'))->with('status', 'Socials added');
    }

     /**
     * Display the specified resource.
     * TODO: $id -> $social
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function show(Social $social)
    {
        //
        return view('admin.socials.show', compact('social'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function edit(Social $social)
    {
        //
        return view('admin.socials.edit', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Social $social)
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
    public function destroy(Social $social)
    {
        //
        $social->delete();

        return redirect()->route('socials.index');
    }
}
