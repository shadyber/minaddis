<?php

namespace App\Http\Controllers;

use App\Channels;
use App\User;
use Auth;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;


class ChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $channels =Channels::paginate(12);

      //  return $users;
        return view('channel.index', ['channels' => $channels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('channel.create');
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

        $this->validate(request(), [

            'name' => 'required',
            'detail' => 'required'
        ]);
        $user_id=Auth::user()->id;
        $channel = new Channels();

        $channel->name = request('name');
        $channel->user_id = $user_id;
        $channel->detail = request('detail');
$channel->save();
return redirect('/video/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Channels  $channels
     * @return \Illuminate\Http\Response
     */
    public function show(Channels $channel)
    {
     $videos=$channel->videos()->orderBy('created_at', 'desc')->paginate(12);
     //return $videos;
        return view('channel.show')->with(['videos'=>$videos,'channel'=>$channel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Channels  $channels
     * @return \Illuminate\Http\Response
     */
    public function edit(Channels $channels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Channels  $channels
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Channels $channels)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Channels  $channels
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channels $channels)
    {
        //
    }
}
