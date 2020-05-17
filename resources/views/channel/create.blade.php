@extends('layouts.app')

@section('content')

    <div class="col-md-12">
        <div class="main-title">

            <h6>Create a Channel</h6>
        </div>
    </div>
    <div class="col-md-12">



            <div class="col-md-8  offset-2">
                {!! Form::open(['url' => '/channel ','method'=>'post']) !!}



                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Title For Your Channel">
                    </div>
                </div>



                <div class="form-group">
                    <label class="control-label col-sm-2" for="detail">Detail Text</label>
                    <div class="col-sm-10">
                <textarea class="form-control" id="detail" name="detail" placeholder="Enter detail or What this Channel is about">
                </textarea>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-2" for="casts">Avatar For Your Channel:</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="avatar" name="avatar" placeholder="Logo or Photo for the Channel Square photo is recomended">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="banner">Banner</label>
                    <div class="col-sm-10"> <small>1500width x 386 height is recomended</small>
                        <input type="file" class="form-control" id="banner" name="banner" placeholder="Logo or Photo for the Channel Square photo is recomended">
                    </div>
                </div>
                <input type="hidden" class="form-control" id="thumb_small" name="thumb_small" placeholder="Video Thumbnile">



                <input type="hidden" class="form-control" id="thumb_big" name="thumb_big" placeholder="Video Thumbnile Big">

                <input type="hidden" id="iframe" name="iframe">

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>


@endsection

