@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-header"><h2>User details</h2></div>
                <div class="panel-body">


                    <div class="row">
                        <div class="col-lg-6">
                            <form>



                                <div class="form-group">
                                    Role
                                    <input class="form-control" disabled type="text" name="name" value="{{$role}}">

                                </div>



                                <div class="form-group">
                                    Name
                                    <input class="form-control" disabled type="text" name="name" value="{{$user->name}}">

                                </div>

                                <div class="form-group">
                                    Email
                                    <input disabled class="form-control" type="email" name="email" value="{{$user->email}}">
                                    @if ($errors->has('email'))
                                        <span>
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>



                                <div class="form-group">
                                    Image
                                    <img   width="250" height="250" src="/{{$user->image}}">

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

