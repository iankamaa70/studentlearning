
@extends('layouts.empty')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add a new Module</div>
                
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
                        <form method="POST" action="{{ route('modules.store') }}">
                            <div class="form-group">
                                @csrf
                                <label for="name">Module name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
                            </div>
                            <div class="form-group">
                              
                                <label for="pass_module_id">Module required to pass</label>
                                <select name="pass_module_id" value="{{ old('pass_module_id') }}" class="form-control">
                                    <option value="">No need to pass any other module to access this module</option>
                                    @foreach ($modules as $module)
                                <option value="{{$module->id}}">{{$module->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="pass_mark">Module Passmark</label>
                                <input type="number" class="form-control" name="pass_mark" value="{{ old('pass_mark') }}"/>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Add Module</button>
        
                            </form>
        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection