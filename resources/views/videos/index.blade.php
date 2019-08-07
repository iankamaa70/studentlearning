
@extends('layouts.empty')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                  
                            <div class="row">

                                    <div class="col-4"> Current videos</div>
                                    <div class="col-4">
                                       @isset($modules)
                                      
                                       @endisset

                                    </div>
                            </div>
                    
                       
                  
                       
                               
                                    
                     
                  
                    </div>
                
                    <div class="card-body">

                            @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif





  <table class="table table-striped" style="text-align:center">
        <thead>
            <tr>
              <td>module</td>
              <td>title</td>
              <td>description</td>
              <td>video</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($videos as $video)
            <tr>
                <td>
                    @foreach ($modules as $module)
                    @if ($video->modules_id==$module->id)
                    {{$module->name}}
                @endif
                    @endforeach
                </td>
                <td>{{$video->title}}</td>
                <td>{{$video->description}}</td>
            <td> <video width="220" height="140" controls src="{{url($video->video)}}"></video> </td>
                <td><a href="{{ route('videos.edit',$video->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{ route('videos.destroy', $video->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    <div>{{$videos->links()}}</div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection