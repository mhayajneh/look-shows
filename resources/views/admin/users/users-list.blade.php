@extends('admin.layouts.app')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('adminPanel')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Users</li>
    </ol>

    @if(session('success_alert'))
        <div class="alert alert-success">{{session('success_alert')}}</div>
    @endif

    @if(session('warning_alert'))
        <div class="alert alert-warning">{{session('warning_alert')}}</div>
    @endif
    @if(session('danger_alert'))
        <div class="alert alert-danger">{{session('danger_alert')}}</div>
    @endif


    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Registered users</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined</th>
                        @role('admin')
                        <th>Controls</th>
                        @endrole
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined</th>
                        @role('admin')
                        <th>Controls</th>
                        @endrole
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($users AS $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        @role('admin')
                        <td>
                            <a  href="{{route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a>

                            <form method="POST" action="{{route('users.destroy',$user->id)}}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')"  class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{route('users.show',$user->id)}}" class="btn btn-warning">View</a>
                        </td>
                        @endrole
                    </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

