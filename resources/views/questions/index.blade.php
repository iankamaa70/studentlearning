
@extends('layouts.empty')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4">
                    <div class="card">
                            <div class="card-header">Modules</div>
                            <div class="card-body">
                                <ul>
                                    @foreach ($modules as $module)
                                    
                                <li><a href="/filter/questions/{{$module->id}}">{{$module->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                    </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Current questions</div>
                
                    <div class="card-body">

                            @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif






  <table class="table table-striped">
        <thead>
            <tr>
              <th>Module</th>
              <th>Question</th>
              <th>Answer explanation</th>
              <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
            <tr>
                <td>
                    @foreach ($modules as $module)
                        @if ($module->id==$question->modules_id)
                            {{$module->name}}
                        @endif
                    @endforeach
                    
                </td>
                <td>{{$question->question_text}}</td>
            <td>{{$question->answer_explanation}}</td>
                <td><a href="{{ route('questions.edit',$question->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{ route('questions.destroy', $question->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td> </tr>
            @endforeach
        </tbody>
      </table>

    <div>{{$questions->links()}}</div>



        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection