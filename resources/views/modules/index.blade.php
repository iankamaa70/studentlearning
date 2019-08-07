
@extends('layouts.empty')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Current modules</div>
                
                    <div class="card-body">

                            @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif






  <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td>Name</td>
              <td>Pass mark</td>
              <td>Module pass required</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($modules as $module)
            <tr>
                <td>{{$module->id}}</td>
                <td>{{$module->name}}</td>
                <td>{{$module->pass_mark}}</td>
                <td>
                    @foreach ($modules as $secondmodule)
                        @if ($secondmodule->id===$module->pass_module_id)
                            {{$secondmodule->name}}
                        @endif
                    @endforeach</td>
                <td><a href="{{ route('modules.edit',$module->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{ route('modules.destroy', $module->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    <div class="paginate">{{$modules->links()}}</div>





        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection