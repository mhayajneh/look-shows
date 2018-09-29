@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-header"><h2>Edit series</h2></div>
                <div class="panel-body">


                    <div class="row">
                        <div class="col-lg-6">
                            <form method="POST" action="{{route('series.update',$series->seriesID)}}" >
                                @csrf
                                @method('PUT')


                                <div class="form-group">
                                    Title
                                    <input class="form-control" type="text" name="title" value="@if(old('title')){{old('title')}}@else{{$series->title}}@endif">
                                    @if ($errors->has('title'))
                                        <span >
                                                    <strong>{{ $errors->first('title') }}</strong>
                                                </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    Description
                                    <textarea class="form-control" name="description" >@if(old('description')){{old('description')}}@else{{$series->description}}@endif</textarea>
                                    @if ($errors->has('description'))
                                        <span >
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    Show time
                                    <input class="form-control" type="text" name="showTime" value="@if(old('showTime')){{old('showTime')}}@else{{$series->showTime}}@endif">
                                    @if ($errors->has('showTime'))
                                        <span >
                                                    <strong>{{ $errors->first('showTime') }}</strong>
                                                </span>
                                    @endif
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-default">Update</button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->

        </div>
    </div>
@endsection

