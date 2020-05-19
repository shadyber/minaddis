<?php

namespace App\Http\Controllers;

use App\Subscribtion;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Auth;
class SubscribtionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=Auth::user();
        SEOTools::setTitle('Minaddis Subscribtion');
        SEOTools::setDescription('Minadis Provides you selected videos from all around the world for you join and share your videos');
        SEOTools::opengraph()->setUrl('https://minaddis.com/subscriptions');
        SEOTools::setCanonical('https://minaddis.com/subscribtions');
        SEOTools::opengraph()->addProperty('type', 'Article');
        SEOTools::twitter()->setSite('@minaddis');


        return view('channel.subscribtions')->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

     $subscribtionstatus=Subscribtion::where('user_id', 'LIKE', '' .  Auth::user()->id)->get()->where('channels_id', 'LIKE', '' .request('channel_id'));
  //  return $subscribtionstatus;
     if(count($subscribtionstatus)==0){

         $subscribe=new Subscribtion();

         $subscribe->channels_id=request('channel_id');
         $subscribe->user_id=Auth::user()->id;

         $subscribe->save();

     }

        return redirect()->back()->with('success', 'done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscribtion  $subscribtion
     * @return \Illuminate\Http\Response
     */
    public function show(Subscribtion $subscribtion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscribtion  $subscribtion
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscribtion $subscribtion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscribtion  $subscribtion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscribtion $subscribtion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscribtion  $subscribtion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscribtion $subscribtion)
    {
        //
    }
}
