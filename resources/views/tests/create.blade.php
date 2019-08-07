
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
<form action="{{route('tests.store')}}" method="POST">
<input type="hidden" name="module_id" value="{{$module->id}}"/>
    @csrf
    <div class="card">
        <div class="card-header">
         Module questions
        </div>
        <?php //dd($questions) ?>
    @if(count($questions) > 0)
        <div class="card-body" style="padding-left:2em;padding-right:2em;">
        <?php $i = 1; ?>
        @foreach($questions as $question)
            @if ($i > 1) <hr /> @endif
            <div class="row">
                <div class="col-xs-12 form-group">
                    <div class="form-group">
                        <strong>Question {{ $i }}.<br />{!! nl2br($question->question_text) !!}</strong>

                        @if ($question->code_snippet != '')
                            <div class="code_snippet">{!! $question->code_snippet !!}</div>
                        @endif

                        <input
                            type="hidden"
                            name="questions[{{ $i }}]"
                            value="{{ $question->id }}">
                    @foreach($question->options as $option)
                        <br>
                        <label class="radio-inline">
                            <input
                                type="radio"
                                name="answers[{{ $question->id }}]"
                                value="{{ $option->id }}">
                            {{ $option->option }}
                        </label>
                    @endforeach
                    </div>
                </div>
            </div>
        <?php $i++; ?>
        @endforeach
        </div>
    @endif
    </div>
    <div class="form-group" style="margin-top:3em">
        <button type="submit" class="btn btn-primary">Submit answers</button>
    </div>
</div>



</form>
@endif
       
@endsection