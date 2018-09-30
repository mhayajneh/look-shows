@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-header"><h2>Create Episode</h2></div>
                <div class="panel-body">


                    <div class="row">
                        <div class="col-lg-6">
                            <form method="POST" action="{{route('episodes.store')}}" enctype="multipart/form-data" >
                                @csrf


                                <div class="form-group">
                                    Title
                                    <input class="form-control" type="text" name="title" value="{{old('title')}}">
                                    @if ($errors->has('title'))
                                        <span>
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
                                    Episode series
                                    <select class="form-control" name="series_seriesID" >
                                        <option disabled value="">Please select series</option>
                                        @foreach($series AS $item)
                                            <option @if(old('series_seriesID') == $item->seriesID) {{"SELECTED"}} @endif value="{{$item->seriesID}}">{{$item->title}}</option>
                                         @endforeach
                                    </select>
                                    @if ($errors->has('series_seriesID'))
                                        <span>
                                            <strong>{{ $errors->first('series_seriesID') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    Thumbnail
                                    <input class="form-control" type="file" name="thumbnail" value="{{old('thumbnail')}}">
                                    @if ($errors->has('thumbnail'))
                                        <span >
                                            <strong>{{ $errors->first('thumbnail') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    Video
                                    <input class="form-control" type="file" name="video" value="{{old('video')}}">
                                    @if ($errors->has('video'))
                                        <span>
                                            <strong>{{ $errors->first('video') }}</strong>
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

