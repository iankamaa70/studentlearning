
@extends('layouts.empty')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Webcontent</div>

                    <div class="card-body">

                            @if ($message = Session::get('success'))

                            <div class="alert alert-success alert-block">
                    
                                <button type="button" class="close" data-dismiss="alert">×</button>
                    
                                    <strong>{{ $message }}</strong>
                    
                            </div>
                    
                            @endif
                    
                      
                    
                            @if (count($errors) > 0)
                    
                                <div class="alert alert-danger">
                    
                                    <strong>Whoops!</strong> There were some problems with your input.
                    
                                    <ul>
                    
                                        @foreach ($errors->all() as $error)
                    
                                            <li>{{ $error }}</li>
                    
                                        @endforeach
                    
                                    </ul>
                    
                                </div>
                    
                            @endif
                    <form method="POST" action="{{route('admin.webcontent.update',$content->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Homepage Bold text</label>
                        <input class="form-control" type="text" name="homepage_bold" value="{{$content->homepage_bold}}"\>
                        </div>
                        <div class="form-group">
                                <label>Homepage normal text</label>
                            <textarea name="homepage_text" cols="5" rows="5" class="form-control">{{$content->homepage_text}}</textarea>
                            </div>

                            <div class="form-group">
                                    <label class="form-label-group">Homepage Image</label>
                            <img src="{{URL::asset($content->homepage_image)}}" style="height: 150px" class="img-fluid">
                               <input type="file" name="homepage_image" class="form-control-sm">
                                </div>
                                <div class="form-group">
                                       
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection