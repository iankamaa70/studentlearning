
@extends('layouts.empty')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add a new Question</div>
                
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
                        <form method="POST" enctype="multipart/form-data" action="{{ route('questions.store') }}">
                            <div class="form-group">
                                    @csrf
                                    <label for="price">Please select module:</label>
                                 <select class="form-control" name="modules_id">
                                     @foreach ($modules as $module)
                                 <option value="{{$module->id}}">{{$module->name}}</option>
                                     @endforeach
                                 </select>
                                </div>
                            <div class="form-group">
                                <label for="price">Question description:</label>
                               <textarea class="form-control" name="question_text" cols="30" rows="10">{{ old('question_text') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Option1 question:</label>
                                <input type="text" class="form-control" name="option1" value="{{ old('option1') }}"/>
                            </div>
                            <div class="form-group">
                                    <label for="quantity">Option2 question:</label>
                                    <input type="text" class="form-control" name="option2" value="{{ old('option1') }}"/>
                                </div>
                                <div class="form-group">
                                        <label for="quantity">Option3 question:</label>
                                        <input type="text" class="form-control" name="option3" value="{{ old('option3') }}"/>
                                    </div>
                                    <div class="form-group">
                                            <label for="quantity">Option4 question:</label>
                                            <input type="text" class="form-control" name="option4" value="{{ old('option4') }}"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="quantity">correct option:</label>
                                           <select class="form-control" name="correct" value="{{ old('correct') }}">
                                               <option value="option1">option1</option>
                                               <option value="option2">option2</option>
                                               <option value="option3">option3</option>
                                               <option value="option4">option4</option>
                                           </select>
                                        </div>
                                        <div class="form-group">
                                                <label for="price">Answer description:</label>
                                               <textarea class="form-control" name="answer_explanation" cols="30" rows="10">{{ old('answer_explanation') }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                    <label for="quantity">More info link:</label>
                                                    <input type="text" class="form-control" name="more_info_link" value="{{ old('more_info_link') }}"/>
                                                </div>
                            <button type="submit" class="btn btn-primary">Add Question</button>

                            
        
                            </form>
        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection