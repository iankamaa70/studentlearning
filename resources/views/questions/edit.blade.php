
@extends('layouts.empty')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Question</div>
                
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
                        <form method="POST" enctype="multipart/form-data" action="{{ route('questions.update',$question->id) }}">
                            <div class="form-group">
                                    @csrf
                                    @method('PATCH')
                                    <label for="price">Please select module:</label>
                            <select value="{{$question->modules_id}}" class="form-control" name="modules_id">
                                     @foreach ($modules as $module)
                                 <option value="{{$module->id}}">{{$module->name}}</option>
                                     @endforeach
                                 </select>
                                </div>
                            <div class="form-group">
                                <label for="price">Question description:</label>
                            <textarea class="form-control" name="question_text" cols="30" rows="10">{{$question->question_text}}</textarea>
                            </div>
                            
                                        <div class="form-group">
                                                <label for="price">Answer description:</label>
                                               <textarea class="form-control"  name="answer_explanation" cols="30" rows="10">{{$question->answer_explanation}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                    <label for="quantity">More info link:</label>
                                                    <input type="text" value="{{$question->more_info_link}}" class="form-control" name="more_info_link"/>
                                                </div>
                            <button type="submit" class="btn btn-primary">Update Question</button>

                            
        
                            </form>
        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection