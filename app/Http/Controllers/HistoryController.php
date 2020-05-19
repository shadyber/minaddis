<?php

namespace App\Http\Controllers;

use App\History;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Auth;
class HistoryController extends Controller
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
        $user_id=Auth::user()->id;
        $histories=History::where('user_id', 'LIKE', '' . $user_id. '')->orderBy('created_at', 'desc')->paginate(12);
//return ($histories);
        SEOTools::setTitle('Minaddis My Watch History');
        SEOTools::setDescription('Minadis Provides you selected videos from all around the world for you join and share your videos');
        SEOTools::opengraph()->setUrl('https://minaddis.com/history');
        SEOTools::setCanonical('https://minaddis.com/history');
        SEOTools::opengraph()->addProperty('type', 'Videos');
        SEOTools::twitter()->setSite('@minaddis');

        SEOTools::OpenGraph()->addImage($histories->videos->last()->thumb_big);
        SEOTools::OpenGraph()->addImage($histories->videos->last()->thumb_small);

        return view('history.index')->with('histories',$histories);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, History $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy(History $history)
    {
        //
    }
}
