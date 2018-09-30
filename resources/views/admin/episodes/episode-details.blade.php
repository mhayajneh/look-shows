@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-header"><h2>View Episode</h2></div>
                <div class="panel-body">


                    <div class="row">
                        <div class="col-lg-6">
                            <form >


                                <div class="form-group">
                                    Title
                                    <input disabled class="form-control" type="text" value=" {{$episode->title}}">

                                </div>
                                <div class="form-group">
                                    Description
                                    <textarea disabled class="form-control" > {{$episode->description}}</textarea>
                                </div>

                                <div class="form-group">
                                    Thumbnail
                                    <img    src="/{{$episode->thumbnail}}" width="250" height="250">
                                </div>
                                <video width="400" controls>
                                    <source src="/{{$episode->video}}" type="video/mp4">
                                    Your browser does not support HTML5 video.
                                </video>
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
