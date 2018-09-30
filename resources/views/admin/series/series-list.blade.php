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
          Series list</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Show time</th>
                        <th>Controls</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Show time</th>
                        <th>Controls</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($series AS $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->showTime}}</td>
                            <td>
                                <a  href="{{route('series.edit',$item->seriesID)}}" class="btn btn-primary">Edit</a>

                                <form method="POST" action="{{route('series.destroy',$item->seriesID)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')"  class="btn btn-danger">Delete</button>
                                </form>
                                <a href="{{route('series.show',$item->seriesID)}}" class="btn btn-warning">View</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

