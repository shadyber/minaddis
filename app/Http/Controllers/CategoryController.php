<?php

namespace App\Http\Controllers;

use App\Category;
use App\Video;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //

        $videos= Video::where('category_id', 'LIKE', '' . $category->id. '')->orderBy('created_at', 'desc')->paginate(12);

        $videos=Video::orderBy('visit', 'desc')->paginate(4);
        SEOTools::setTitle('Minaddis Videos Category');
        SEOTools::setDescription('Minadis Provides you selected videos from all around the world for you join and share your videos');
        SEOTools::opengraph()->setUrl('https://minaddis.com/history');
        SEOTools::setCanonical('https://minaddis.com/history');
        SEOTools::opengraph()->addProperty('type', 'Videos');
        SEOTools::twitter()->setSite('@minaddis');

        SEOTools::OpenGraph()->addImage($videos->last()->thumb_big);
        SEOTools::OpenGraph()->addImage($videos->last()->thumb_small);
        return view('catagory.show')->with(['category'=>$category,'videos'=>$videos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        //
    }
}
