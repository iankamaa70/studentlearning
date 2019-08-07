
@extends('layouts.empty')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add a new video</div>
                
                    <div class="card-body">

                            @if ($errors->any())
                            <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                            </div><br />
                          @endif
                        <form method="POST" enctype="multipart/form-data" action="{{ route('videos.update', $videos->id) }}">
                            <div class="form-group">
                                @csrf
                                @method('PATCH')
                                <label for="name">Video title</label>
                                <input type="text" class="form-control" name="title" value="{{$videos->title}}"/>
                            </div>
                            <div class="form-group">
                                    <label for="price">Please select module:</label>
                                 <select class="form-control" name="modules_id" value="{{$videos->modules_id}}">
                                     @foreach ($modules as $module)
                                 <option value="{{$module->id}}" 
                                    @if ($module->id==$videos->modules_id)
                                        selected="selected"
                                    @endif
                                    
                                    >{{$module->name}}</option>
                                     @endforeach
                                 </select>
                                </div>
                            <div class="form-group">
                                <label for="price">Video description:</label>
                               <textarea class="form-control" name="description" cols="30" rows="10">{{$videos->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Video file:</label>
                            <input type="file" class="form-control" name="video" value="{{url($videos->video)}}"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Add to collection</button>
        
                            </form>
        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection