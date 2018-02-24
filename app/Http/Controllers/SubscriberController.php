<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriberRequest;
use App\Subscriber;
use Illuminate\Http\Request;
use App\Bunch;
use Illuminate\Support\Facades\Auth;
use App\Owned;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index(Subscriber $subscriber, Bunch $bunch)
    {
        //получить всех подписчиков из списка просто вызвав свойство обьекта, с которым они связаны
        $subscribers = $bunch->subscribers;//?????????owned(); //'desc'; //zarabotala bo v belonTo bunch+es() na subs
        //$subscribers = Subscriber::orderBy('created_at', 'desc')->where('bunch_id', $bunch->id_subscriber)->where('created_by', Auth::user()->id)->get(); 
        return view('subscriber.index', compact('bunch'));
       
        // return view('subscriber.index', [
        //   'subscribers' => Subscriber::orderBy('created_at', 'desc')->paginate(10), 'bunch' => Bunch::with('children')->where('parent_id', '0')->get()
        //]);
        

    }
    
    public function show(Bunch $bunch, Subscriber $subscriber) {
        return view('subscriber.show', compact('subscriber', 'bunch'));
    }
    /**
     * Show the form for creating a new resource.

     * @return \Illuminate\Http\Response
     */
    public function create(Bunch $bunch, Subscriber $subscriber)
    {
       
        return view('subscriber.create', compact('bunch', 'subscriber'));
      //    return view('subscriber.create', [
      // 'subscriber'   => [],
      // 'bunch' => Bunch::with('children')->where('parent_id', '0')->get(),
      // 'delimiter'  => ''
      //   ]);
    }
 // public function create(Bunch $bunch, $subscriber_id = null)
 //    {
 //        $subscribers = null;
 //        if(!$subscriber_id){
 //            $subscribers = Subscriber::where(user_id, Auth::user()->id);
 //        }
 //        return view('subscriber.create', compact('bunch'=>$bunch, ['subscriber_id'=>$subscriber_id], 'subscribers'=>$subscribers));
 //    }
    ////////////////////////////////////////////////////////////////////
    // return view('subscriber.create', [
    //   'subscriber'   => [],
    //   'bunches' => Bunch::with('children')->where('parent_id', '0')->get(),
    //   'delimiter'  => ''
    //     ]);
    /**
     * Store a newly created resource in storage.
     *
     * @param SubscriberRequest $subscriberRequest
     * @param Bunch $bunch
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Bunch $bunch, Subscriber $subscriber, SubscriberRequest $subscriberRequest)
    {
        //Auth::user()->
        $bunch->subscribers()->create($subscriberRequest->all());

        return redirect()->route('subscriber.index', compact('bunch', 'subscriber'));//->withBunch($bunch);//->with('me');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   // Subscriber $post or id
    public function edit(Bunch $bunch, Subscriber $subscriber)
    {
       
        return view('subscriber.edit', compact('bunch', 'subscriber'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SubscriberRequest  $subscriberRequest
     * @param  Bunch  $bunch
     * @return \Illuminate\Http\Response
     */
    public function update(SubscriberRequest $request, Subscriber $subscriber)
    {
        //$subscriber->update($request->all());
        $bunch->subscribers()->update($subscriberRequest->all());
        return redirect()->route('subscriber.index', compact('bunch'));
    }
    /**
     * Remove the specified resource from storage.
     * @param Bunch $bunch
     * @param  Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bunch $bunch, Subscriber $subscriber)
    {
        $subscriber->delete();

        return redirect()->route('subscriber.index', compact('bunch'));
    }
}
