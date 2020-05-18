@extends('layouts.app')
@section('content')
         <div class="col-md-12">
              @foreach($user->channels as $channel)
                 <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="channels-card">
                         <div class="channels-card-image">
                             <a href="/channel/{{$channel->id}}"><img class="img-fluid" src="{{$channel->avatar}}" alt="{{$channel->name}}"></a>

                             <div class="channels-card-image-btn"><button type="button" class="btn btn-success btn-sm border-none">Subscribers <strong>{{count($channel->subscribtion)}}</strong></button>

                              <button type="button" class="btn btn-warning btn-sm border-none"><i class="fas fa-times-circle"></i></button>

                             </div>

                         </div>
                         <div class="channels-card-body">
                             <div class="channels-title">
                                 <a href="#">{{$channel->name}} <span title="{{$channel->name}}" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span></a>
                             </div>
                             <div class="channels-view">
                                 {{count($channel->Subscribtion)}} subscribers
                             </div>
                         </div>
                     </div>
                 </div>
             @endforeach
         </div>
@endsection
