
@extends('layouts.empty')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Students</div>

                    <div class="card-body">
                        <h6>please select a student</h6>
                        @if (count($errors) > 0)
    <div class="error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                        <form method="POST" action="{{route('admin.studentprogress')}}">
                        <div class="row">
                      
                            <div class="col-6">
                                @csrf
                                <select class="form-control" name='student_id'>
                                    @forelse ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                    @empty
                                <option value="">No students found!!</option> 
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-outline-primary" type="submit">Fetch progress </button>
                            </div>
                           
                        </div>
                        </form>
                    </div>

                </div>
                @if (isset($chart))
                <div class="card">
                    <div class="card-header">
                        {{$user_selected->name}}
                    </div>
                    <div class="card-body">
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
                        {!! $chart->script() !!}
                        {!! $chart->container() !!} 
                        <div>
                            <table class="table table-striped table-bordered table-condensed">
                                <thead>
                                    <tr>
                                    <td>Module</td>
                                    <td>Times taken</td>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stats as $stat)
                                    <tr>
                                            <td>{{$stat->name}}</td>
                                            <td>{{$stat->total}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
             
                    </div>
                </div>

                               
                @endif

               

            </div>
        </div>





    </div>
@endsection