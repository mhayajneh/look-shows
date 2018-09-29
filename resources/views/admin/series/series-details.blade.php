@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-header"><h2>View series</h2></div>
                <div class="panel-body">


                    <div class="row">
                        <div class="col-lg-6">
                            <form >


                                <div class="form-group">
                                    Title
                                    <input disabled class="form-control" type="text" value=" {{$series->title}}">

                                </div>
                                <div class="form-group">
                                    Description
                                    <textarea disabled class="form-control" > {{$series->description}}</textarea>
                                </div>

                                <div class="form-group">
                                    Show time
                                    <input disabled class="form-control" type="text" value="{{$series->showTime}}">
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
