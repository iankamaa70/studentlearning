
@extends('layouts.app') 


@section('content')
<div class="container">
@if(\Session::has('error'))
<div class="alert alert-danger">
{{Session::get('error')}}
</div>
@endif


@if (auth()->user()->isAdmin==1)

    
@else
<div class="container-fluid">
       
                <div class="row">
                        <div align="center" class="col-3">
                            <h2>Modules</h2>

                            @foreach ($modules as $module)
                            <a href="/home/{{$module->id}}" ><div class="card"> 
                            <div class="card-body text-body"><b>{{$module->name}}</b></div>
                        </div></a>
                          
                                  @endforeach
                                  <div class="pagination"> <span > {{$modules->links()}}</span></div>
                            </div>
                            <div class="col-9">
                                    <div class="card">
                                            <div class="card-header">Videos</div>
                                            <div class="card-body">
                                                @if (count($videos)<1)
                                                    <p>Sorry ,there are no videos at the moment</p>
                                                @else
                                                
                                                @foreach ($videos as $video)
                                                <div class="row">
                                                    <div align="center" class="col-12">
                                                            <h4><b>{{$video->title}}</b></h4>
                                                            <div class="js-player embed-responsive embed-responsive-16by9 mb-32pt">
                                                                    <div class="player embed-responsive-item">
                                                                        <div class="player__content">
                                                                            <div class="player__image" style="--player-image: url(assets/images/illustration/player.svg)"></div>
                                                                            <a href="#" class="player__play">
                                                                                <span class="material-icons">play_arrow</span>
                                                                            </a>
                                                                        </div>
                                                                        <div class="player__embed d-none">
                                                                            <video class="embed-responsive-item" id="player" playsinline  controls>
                                                                                <source src="{{url($video->video)}}">
                                                                            </video>
                                                                        </div>
                                                                    </div>
                                                                </div> </div>
                                                    <div class="col-12">
                                                    <br>
                                                    <p style="margin:5px">{{$video->description}}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                
                                            @endforeach
                                            <br>
                                              <div> <span > {{$videos->links()}}</span></div>
                                                <br>
                                            <a href="{{route('tests.index',$videos[0]->modules_id)}}" class="btn btn-block btn-success">Take test</a>
                                        
                                                @endif
                                               </div>
                                            <div>
    
                                </div>
    
                    </div>
    
                        </div>
         

</div>
</div>
</div>

@endif
       
@endsection