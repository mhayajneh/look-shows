@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-header"><h2>Create series</h2></div>
                <div class="panel-body">


                    <div class="row">
                        <div class="col-lg-6">
                            <form method="POST" action="{{route('series.store')}}" >
                               @csrf


                                        <div class="form-group">
                                            Title
                                            <input class="form-control" type="text" name="title" value="{{old('title')}}">
                                            @if ($errors->has('title'))
                                                <span >
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            Description
                                            <textarea class="form-control" name="description" >{{old('description')}}</textarea>
                                            @if ($errors->has('description'))
                                                <span>
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            Show time
                                            <input class="form-control" type="text" name="showTime" value="{{old('showTime')}}">
                                            @if ($errors->has('showTime'))
                                                <span >
                                                    <strong>{{ $errors->first('showTime') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                <div>
                                    <button type="submit" class="btn btn-default">Store</button>
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

