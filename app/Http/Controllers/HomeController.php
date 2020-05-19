<?php

namespace App\Http\Controllers;

use App\Video;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth'=>'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        SEOTools::setTitle('Minaddis Videos and Selected Contents for everyone ');
        SEOTools::setDescription('Share your youtube video and get huge traffic from minaddis. Minadis Provides you selected videos from all around the world for you join and share your videos');
        SEOTools::opengraph()->setUrl('https://minaddis.com/subscriptions');
        SEOTools::setCanonical('https://minaddis.com/subscribtions');
        SEOTools::opengraph()->addProperty('type', 'Video');
        SEOTools::twitter()->setSite('@minaddis');

        return view('home');
    }
}
