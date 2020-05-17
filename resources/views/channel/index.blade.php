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
                <h6>Channels</h6>
            </div>

        </div>
        @foreach($channels as $channel)

      <div class="col-xl-3 col-sm-6 mb-3">
          {!! Form::open(['url' => '/subscribtion','method'=>'post','class'=>'ajaxform']) !!}

          <input type="hidden" value="{{$channel->id}}" name="channel_id">

          <div class="channels-card">
                <div class="channels-card-image">
                    <a href="/channel/{{$channel->id}}"><img class="img-fluid" src="{{$channel->avatar}}" alt="{{$channel->name}}"></a>
                    <div class="channels-card-image-btn"><button type="submit" class="btn btn-outline-danger btn-sm">Subscribe <strong>  {{count($channel->subscribtion)}}</strong></button></div>
                </div>
                <div class="channels-card-body">
                    <div class="channels-title">
                        <a href="/channel/{{$channel->id}}">{{$channel->name}}</a>
                    </div>
                    <div class="channels-view">
                        {{count($channel->subscribtion)}} subscribers
                    </div>
                </div>
            </div>
          {!! Form::close() !!}
        </div>

        @endforeach

</div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center pagination-sm mb-4">
                {{ $channels->links() }}
            </ul>
        </nav>

        <hr>
        <div class="video-block section-padding">
            <div class="row">
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
                        <h6>Featured Videos</h6>
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
                                    {{$video->category_id}}  <a title="{{$video->title}}" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                </div>
                                <div class="video-view">
                                    {{$video->visit}} views &nbsp;<i class="fas fa-calendar-alt"></i> {{$video->created_at->diffForHumans()}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
 </div>
@endsection
