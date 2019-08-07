
@extends('layouts.empty')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit current  Module</div>
                
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
                        <form method="POST" action="{{ route('modules.update',$modules->id) }}">
                            <div class="form-group">
                                @csrf
                                @method('PATCH')
                                <label for="name">Module name</label>
                                <input type="text" class="form-control" name="name" value="{{ $modules->name }}"/>
                            </div>

                            <div class="form-group">
                              
                                <label for="pass_module_id">Module required to pass</label>
                                <select name="pass_module_id" value="{{ $modules->pass_module_id}}" class="form-control">
                                    <option value="">No need to pass any other module to access this module</option>
                                    @foreach ($allmodules as $module)
                                    @if ($module->id!=$modules->id)
                                    <option value="{{$module->id}}"
                                        @if ($modules->pass_module_id==$module->id)
                                            selected="selected"
                                        @endif
                                        >{{$module->name}}</option>
                                    @endif
                               
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="pass_mark">Module Passmark</label>
                                <input type="number" class="form-control" name="pass_mark" value="{{$modules->pass_mark }}"/>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Update Module</button>
        
                            </form>
        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection