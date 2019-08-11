
@extends('layouts.empty')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                       <div class="row">
                           <div class="col-6"> 
                            <h5><b>Users pending approval</b></h5>
                        <table class="table">
                            <tr>
                                <th>User name</th>
                                <th>Email</th>
                                <th>Registered at</th>
                                <th></th>
                            </tr>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($user->created_at))->diffForHumans() ?></td>
                                    <td><a href="{{ route('teacher.user.approve', $user->id) }}"
                                           class="btn btn-success btn-sm">Approve</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No users found.</td>
                                </tr>
                            @endforelse
                        </table></div>
                           <div class="col-6">
                            <h5><b>Users Already approved</b></h5>
                        <table class="table">
                            <tr>
                                <th>User name</th>
                                <th>Email</th>
                                <th>Registered at</th>
                                <th colspan="2">action</th>
                            </tr>
                            @forelse ($approved as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($user->created_at))->diffForHumans() ?></td>
                                    <td><a href="{{ route('admin.users.delete', $user->id) }}"
                                          
                                          @if ($user->email=="iankamaa70@gmail.com")
                                          class="btn btn-danger btn-sm disabled"
                                          @else
                                          class="btn btn-danger btn-sm" 
                                          @endif
                                           >Delete</a></td>
                                
                                <td><a href="{{ route('admin.users.block', $user->id) }}"
                                    class="btn btn-primary btn-sm">block</a></td>
                         </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No users found.</td>
                                </tr>
                            @endforelse
                        </table>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>











        <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Teachers</div>
    
                        <div class="card-body">
                            @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                           <div class="row">
                               <div class="col-6"> 
                                <h5><b>Current Students</b></h5>
                            <table class="table">
                                <tr>
                                    <th>User name</th>
                                    <th>Email</th>
                                    <th>Registered at</th>
                                    <th></th>
                                </tr>
                                @forelse ($nonteachers as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($user->created_at))->diffForHumans() ?></td>
                                        <td><a href="{{ route('teacher.users.approve', $user->id) }}"
                                               class="btn btn-success btn-sm disabled">Make teacher</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Teachers found</td>
                                    </tr>
                                @endforelse
                            </table></div>
                               <div class="col-6">
                                <h5><b>Teachers</b></h5>
                            <table class="table">
                                <tr>
                                    <th>User name</th>
                                    <th>Email</th>
                                    <th>Registered at</th>
                                    <th colspan="2">action</th>
                                </tr>
                                @forelse ($teachers as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($user->created_at))->diffForHumans() ?></td>
                                        <td><a href="{{ route('admin.users.delete', $user->id) }}" class="btn btn-danger btn-sm disabled">Delete</a></td>
                                    
                                    <td><a href="{{ route('teacher.users.block', $user->id) }}"
                                        class="btn btn-primary btn-sm disabled">block</a></td>
                             </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No teachers found.</td>
                                    </tr>
                                @endforelse
                            </table>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection