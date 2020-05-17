@extends('layouts.app')
@section('content')

    <div class="video-block section-padding">
        <div class="row">
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
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center pagination-sm mb-0">
                {{ $videos->links() }}
            </ul>
        </nav>
    </div>

    <!-- /.container-fluid -->
@endsection
