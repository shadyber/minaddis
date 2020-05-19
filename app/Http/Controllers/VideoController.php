<?php

namespace App\Http\Controllers;

use App\Category;
use App\Channels;
use App\History;
use App\Subscribtion;
use App\Video;
use Illuminate\Http\Request;
use Auth;

use Artesaos\SEOTools\Facades\SEOTools;
class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $videos=Video::orderBy('created_at', 'desc')->paginate(12);

        SEOTools::setTitle('Minaddis Videos');
        SEOTools::setDescription('Minadis Provides you selected videos from all around the world for you join and share your videos');
        SEOTools::opengraph()->setUrl('https://minaddis.com/video');
        SEOTools::setCanonical('https://minaddis.com/video');
        SEOTools::opengraph()->addProperty('type', 'videos');
        SEOTools::twitter()->setSite('@minaddis');

        SEOTools::OpenGraph()->addImage($videos->last()->thumb_big);
        SEOTools::OpenGraph()->addImage($videos->last()->thumb_small);


        return view('video.index')->with('videos',$videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id=Auth::user()->id;
        //
      $channels  =Channels::where('user_id', 'LIKE', '' . $user_id. '')->get();
      $categories  =Category::all();
        return view('video.create')->with(['channels'=>$channels,'categories'=>$categories]);
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
            'url' => 'required|unique:videos',
            'title' => 'required',
            'detail' => 'required',
            'thumb_small' => 'required',
            'thumb_big' => 'required',
        ]);
        $user_id=Auth::user()->id;
        $video = new Video();

        $video->title = request('title');
        $video->videoId = request('videoId');
        $video->detail = request('detail');
        $video->category_id = request('category_id');
        $video->thumb_small = request('thumb_small');
        $video->thumb_big = request('thumb_big');
        $video->iframe = request('iframe');
        $video->tags = request('tags');
        $video->url = request('url');
        $video->casts = request('casts');
        $video->visit = '0';
        $video->user_id =$user_id;
        $video->channels_id =request('channels_id');


       $video->save();

        return redirect('/video')->with('success','Video created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //

        $cat=$video["category_id"];
        $videos= Video::where('category_id', 'LIKE', '' . $cat. '')->get();
        $channel=Channels::where('id', 'LIKE',''.$video->channels_id)->get();
        $category=Category::where('id', 'LIKE',''.$video->category_id)->get();
        $usbscribers=Subscribtion::where('channels_id', 'LIKE',''.$video->channels_id)->get();
        if(Auth::user()){
          $user_id= Auth::user()->id;
          $history=new History();
          $history->user_id=$user_id;
          $history->video_id=$video->id;
          $history->save();
        }



        SEOTools::setTitle('Minaddis Watch'.$video->title);
        SEOTools::setDescription('Minadis Provides you selected videos from all around the world for you join and share your videos');
        SEOTools::opengraph()->setUrl('https://minaddis.com/video/'.$video->id.'');
        SEOTools::setCanonical('https://minaddis.com/video/'.$video->id.'');
        SEOTools::opengraph()->addProperty('type', 'videos');
        SEOTools::twitter()->setSite('@minaddis');
        SEOTools::jsonLd()->addImage($video->thumb_big);

        SEOTools::OpenGraph()->addImage($video->thumb_big);
         SEOTools::OpenGraph()->addImage($video->thumb_small);

        $video->visit++;
        $video->save();
        return view('video.watch')->with(['vid'=>$video,'videos'=>$videos,'channel'=>$channel,'category'=>$category,'subscribers'=>$usbscribers]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }
}
