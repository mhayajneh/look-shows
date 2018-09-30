@extends('admin.layouts.app')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('adminPanel')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Series</li>
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
            Episodes list</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Controls</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Controls</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($episodes AS $episode)
                        <tr>
                            <td>{{$episode->title}}</td>
                            <td>{{$episode->description}}</td>
                            <td>
                                <a  href="{{route('episodes.edit',$episode->episodeID)}}" class="btn btn-primary">Edit</a>

                                <form method="POST" action="{{route('episodes.destroy',$episode->episodeID)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')"  class="btn btn-danger">Delete</button>
                                </form>
                                <a href="{{route('episodes.show',$episode->episodeID)}}" class="btn btn-warning">View</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

