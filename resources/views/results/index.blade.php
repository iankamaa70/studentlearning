
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
       Results
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped {{ count($results) > 0 ? 'datatable' : '' }}">
            <thead>
                <tr>
                @if(auth()->user()->isAdmin==1)
                    <th>user</th>
                @endif
                    <th>date</th>
                    <th>passed</th>
                    <th>Module</th>
                    <th>Result</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>

            <tbody>
                @if (count($results) > 0)
                    @foreach ($results as $result)
                        <tr>
                        @if(auth()->user()->isAdmin==1)
                            <td>{{ $result->user->name or '' }} ({{ $result->user->email or '' }})</td>
                        @endif
                <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($result->created_at))->diffForHumans() ?></td>
                <td>
                  @if ($result->pass==0)
                  <i class="material-icons">cancel</i>
                  @else
                  <i class="material-icons">check_circle</i>
                  @endif
                </td>
                <td> @foreach ($modules as $module)
                    @if ($module->id==$result->module_id)
                        {{$module->name}}
                    @endif
                @endforeach</td>  
                <td>{{ $result->result }}/
                            @foreach ($modules as $module)
                                @if ($module->id==$result->module_id)
                                    {{$module->pass_mark}}
                                @endif
                            @endforeach
                            </td>
                            <td>
                                <a href="{{ route('results.show',[$result->id]) }}" class="btn btn-xs btn-primary">view</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">You have not taken any tests</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
</div>
@endif
       
@endsection