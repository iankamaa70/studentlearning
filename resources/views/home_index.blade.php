
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
<div class="">
        <div class="">
                Select module and view videos
            </div>
           <div class="card-body">
                <div class="row">
                        <div align="center" class="col-3">
                                <h2>Modules</h2>
    
                                @foreach ($modules as $module)
                                <a href="/home/{{$module->id}}" ><div class="card"> 
                                <div class="card-body text-body"><b>{{$module->name}}</b></div>
                            </div></a>
                              
                                      @endforeach
                                      <div> <span > {{$modules->links()}}</span></div>
                                </div>
                            <div class="col-8">
                                    <div class="card">
                                            @if(!empty($errormessage))
                                            <div class="alert alert-danger"> {{ $errormessage }}</div>
                                          @endif
                                            <div class="card-header">Videos</div>
                                            <div class="card-body">
                                                <p>Please select a module to proceed.please note that you
                                                    cannot access a module unless you have completed the previous module
                                                </p>
                                                <br>
                                               
                                            </div>
                                            <div>
    
                                </div>
    
                    </div>
    
                        </div>
         


</div>
</div> 
</div>
</div>
@endif
       
@endsection