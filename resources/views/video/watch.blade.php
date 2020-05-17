
@extends('layouts.app')
@section('content')

            <div class="row">
                <div class="col-md-8">
                    <div class="single-video-left">
                        <div class="single-video"  id="player">
                            <iframe width="100%"
                                    height="315"
                                    src="https://www.youtube.com/embed/{{$vid->videoId}}?start=5"
                                    frameborder="0"
                                    allow="accelerometer;
                                     autoplay;
                                     encrypted-media;
                                      gyroscope;
                                       picture-in-picture"
                                    allowfullscreen></iframe>

                        </div>
                        <div class="single-video-title box mb-3">
                            <h2><a href="#">{{$vid->title}}.</a></h2>
                            <p class="mb-0"><i class="fas fa-eye"></i> {{$vid->visit}} views</p>
                        </div>
                        @foreach($channel as $ch)
                        <div class="single-video-author box mb-3 ">
                            {!! Form::open(['url' => '/subscribtion','method'=>'post','class'=>'ajaxform']) !!}

                            <input type="hidden" value="{{$ch->id}}" name="channel_id">
                            <div class="float-right"><button class="btn btn-danger" type="submit">Subscribe <strong>{{count($subscribers)}}</strong></button> <button class="btn btn btn-outline-danger" type="button"><i class="fas fa-bell"></i></button></div>
                            <img class="img-fluid" src="{{$ch->avatar}}" alt="{{$ch->name}}">
                            <p><a href="/channel/{{$ch->id}}"><strong>{{$ch->name}}</strong></a> <span title="{{$ch->name}}" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span></p>
                            <small>Published on {{$ch->created_at->diffForHumans()}}</small>
                            {!! Form::close() !!}
                        </div>
                        @endforeach
                        <div class="single-video-info-content box mb-3">
                            <h6>Cast:</h6>
                            <p>{{$vid->casts}}</p>
                            <h6>Category :</h6>
                            <p>{{$category[0]->name}}</p>
                            <h6>About :</h6>
                           <p>{{$vid->detail}}</p>
                            <h6>Tags :</h6>
                            <p class="tags mb-0">
                                @foreach(explode(',', $vid->tags) as $tags)
                                    <span><a href="#">{{$tags}} </a></span>
                                  @endforeach

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-video-right">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="adblock">
                                    <div class="img">
                                        Google AdSense<br>
                                        336 x 280
                                    </div>
                                </div>

                                <div class="main-title">
                                    <div class="btn-group float-right right-action">
                                        <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                        </div>
                                    </div>
                                    <h6>Up Next</h6>
                                </div>
                            </div>
                            <div class="col-md-12">
@for($i=0;$i<count($videos)&&$i<5;$i++)
                                <div class="video-card video-card-list">
                                    <div class="video-card-image">
                                        <a class="play-icon" href="/video/{{$videos[$i]->id}}"><i class="fas fa-play-circle"></i></a>
                                        <a href="/video/{{$videos[$i]->id}}"><img class="img-fluid" src="{{$videos[$i]->thumb_small}}" alt="{{$videos[$i]->title}}"></a>
                                        <div class="time">3:50</div>
                                    </div>
                                    <div class="video-card-body">
                                        <div class="btn-group float-right right-action">
                                            <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp;Play Next</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Save For Later</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Remove</a>
                                            </div>
                                        </div>
                                        <div class="video-title">
                                            <a href="/video/{{$videos[$i]->id}}">{{$videos[$i]->title}}</a>
                                        </div>
                                        <div class="video-page text-success">
                                            {{$videos[$i]->cateogry_id}}  <a title="{{$videos[$i]->id}}" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                        </div>
                                        <div class="video-view">
                                            1.8M views &nbsp;<i class="fas fa-calendar-alt"></i>{{$videos[$i]->created_at->diffForHumans()}}
                                        </div>
                                    </div>
                                </div>
                                @endfor

                                <div class="adblock mt-0">
                                    <div class="img">
                                        Google AdSense<br>
                                        336 x 280
                                    </div>
                                </div>

                                <div class="video-card video-card-list">
                                    <div class="video-card-image">
                                        <a class="play-icon" href="#"><i class="fas fa-play-circle"></i></a>
                                        <a href="#"><img class="img-fluid" src="/img/v2.png" alt=""></a>
                                        <div class="time">3:50</div>
                                    </div>
                                    <div class="video-card-body">
                                        <div class="btn-group float-right right-action">
                                            <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                            </div>
                                        </div>
                                        <div class="video-title">
                                            <a href="#">Duis aute irure dolor in reprehenderit in.</a>
                                        </div>
                                        <div class="video-page text-success">
                                            Education  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                        </div>
                                        <div class="video-view">
                                            1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection

    <script>
    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');
var video={!! json_encode($vid->toArray()) !!}
    var videoId=video["videoId"];
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            height: '500',
            width: '100%',
            origin: 'https://www.youtube.com',
            videoId: videoId,
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }

    // 4. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
        player.seekTo(8);
        event.target.playVideo();
    }

    // 5. The API calls this function when the player's state changes.
    //    The function indicates that when playing a video (state=1),
    //    the player should play for six seconds and then stop.
    var done = false;
    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {

        }
        if(event.data === 0) {
            window.location.href = "/video/"+(video["id"]+1)+"";
        }
    }
    function stopVideo() {
        player.stopVideo();
    }
</script>
