
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
<div class="card card-default">
    <div class="card-header">
       Results for test
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    @if(auth()->user()->isAdmin==1)
                    <tr>
                        <th>email</th>
                        <td>{{ $test->user->name }} ({{ $test->user->email }})</td>
                    </tr>
                    @endif
                    <tr>
                        <th>date</th>
                        <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($test->created_at))->diffForHumans() ?></td>
                    </tr>
                    <tr>
                        <th>Results</th>
                    <td>{{ $test->result }}/{{$test->total}}</td>
                    </tr>
                </table>
            <?php $i = 1 ?>
            @foreach($results as $result)
                <table class="table table-bordered table-striped">
                    <tr class="test-option{{ $result->correct ? '-true' : '-false' }}">
                        <th style="width: 10%">Question #{{ $i }}</th>
                        <th>{{ $result->question->question_text or '' }}</th>
                    </tr>
                    @if ($result->question->code_snippet != '')
                        <tr>
                            <td>Code snippet</td>
                            <td><div class="code_snippet">{!! $result->question->code_snippet !!}</div></td>
                        </tr>
                    @endif
                    <tr>
                        <td>Options</td>
                        <td>
                            <ul>
                            @foreach($result->question->options as $option)
                                <li style="@if ($option->correct == 1) font-weight: bold; @endif
                                    @if ($result->option_id == $option->id) text-decoration: underline @endif">{{ $option->option }}
                                    @if ($option->correct == 1) <em>(correct answer)</em> @endif
                                    @if ($result->option_id == $option->id) <em>(your answer)</em> @endif
                                </li>
                            @endforeach
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>Answer Explanation</td>
                        <td>
                        {!! $result->question->answer_explanation  !!}
                            @if ($result->question->more_info_link != '')
                                <br>
                                <br>
                                Read more:
                                <a href="{{ $result->question->more_info_link }}" target="_blank">{{ $result->question->more_info_link }}</a>
                            @endif
                        </td>
                    </tr>
                </table>
            <?php $i++ ?>
            @endforeach
            </div>
        </div>

        <p>&nbsp;</p>

        <a href="{{ route('home') }}" class="btn btn-default">Take another quiz</a>
        <a href="{{ route('results.index') }}" class="btn btn-default">See all my results</a>
    </div>
</div>
</div>
@endif
       
@endsection