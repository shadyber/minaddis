@extends('layouts.app')
@section('content')
    <div class="col-md-12">
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
            <h6>Minaddis</h6>
        </div>
    </div>

            @foreach($videos as $video)
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="video-card">
                        <div class="video-card-image">
                            <a class="play-icon" href="/video/{{$video->id}}"><i class="fas fa-play-circle"></i></a>
                            <a href="/video/{{$video->id}}"><img class="img-fluid" src="{{$video->thumb_small}}" alt="{{$video->title}}"></a>
                            <div class="time">3:50</div>
                        </div>
                        <div class="video-card-body">
                            <div class="video-title">
                                <a href="/video/{{$video->id}}">{{$video->title}}</a>
                            </div>
                            <div class="video-page text-success">
                                {{$video->category->name}}  <a title="{{$video->title}}" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                            </div>
                            <div class="video-view">
                                {{$video->visit}} views &nbsp;<i class="fas fa-calendar-alt"></i> {{$video->created_at->diffForHumans()}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

@endsection
