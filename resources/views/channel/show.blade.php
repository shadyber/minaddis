@extends('layouts.app')
@section('content')



        <div class="single-channel-image">
            <img class="img-fluid" alt="" src="{{$channel->banner}}">
            <div class="channel-profile">
                <img class="channel-profile-img" alt="" src="{{$channel->avatar}}">
                <div class="social hidden-xs">
                    Social &nbsp;
                    <a class="fb" href="#">Share to Facebook</a>
                    <a class="tw" href="#">Share on Twitter</a>
                    <a class="gp" href="#">Share with Google</a>
                </div>
            </div>
        </div>
        <div class="single-channel-nav">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="channel-brand" href="#">{{substr($channel->name, 0, 22) }} <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Videos <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Playlist</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Channels</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Discussion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Donate
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control form-control-sm mr-sm-1" type="search" placeholder="Search" aria-label="Search"><button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button> &nbsp;&nbsp;&nbsp; <button class="btn btn-outline-danger btn-sm" type="button">Subscribe <strong>1.4M</strong></button>
                    </form>
                </div>
            </nav>
        </div>

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
                            <h6>Videos</h6>
                        </div>
                    </div>
                    @foreach($videos as $video)
                    <div class="col-xl-3 col-sm-6 mb-3">

                        <div class="video-card">
                            <div class="video-card-image">
                                <a class="play-icon" href="/video/{{$video->id}}"><i class="fas fa-play-circle"></i></a>
                                <a href="/video/{{$video->id}}"><img class="img-fluid" src="{{$video->thumb_small}}" alt=""></a>
                                <div class="time">3:50</div>
                            </div>
                            <div class="video-card-body">
                                <div class="video-title">
                                    <a href="#">{{$video->title}}</a>
                                </div>
                                <div class="video-page text-success">
                                    {{$video->category->name}}  <a title="{{$video->title}}" data-placement="top" data-toggle="tooltip" href="/video/{{$video->id}}" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                </div>
                                <div class="video-view">
                                    {{$video->visit}} views &nbsp;<i class="fas fa-calendar-alt"></i>{{$video->created_at->diffForHumans()}}
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
