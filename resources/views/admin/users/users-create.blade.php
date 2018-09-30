@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-header"><h2>Create user</h2></div>
                <div class="panel-body">


                    <div class="row">
                        <div class="col-lg-6">
                            <form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data"  >
                                @csrf
                                <div class="form-group">
                                    Role
                                    <select class="form-control" name="role">
                                        <option disabled value="">Please select role for this user</option>
                                        @foreach($roles AS $role)
                                            <option @if(old('role') == $role->id) {{"SELECTED"}} @endif value="{{$role->id}}">{{$role->display_name}}</option>
                                         @endforeach
                                    </select>
                                    @if ($errors->has('role'))
                                        <span>
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    Name
                                    <input class="form-control" type="text" name="name" value="{{old('name')}}">
                                    @if ($errors->has('name'))
                                        <span>
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    Email
                                    <input class="form-control" type="email" name="email" value="{{old('email')}}">
                                    @if ($errors->has('email'))
                                        <span>
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    Password
                                    <input class="form-control" type="password" name="password" value="{{old('password')}}">
                                    @if ($errors->has('password'))
                                        <span>
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    Confirm Password
                                    <input class="form-control" type="password" name="password_confirmation" value="{{old('password_confirmation')}}">
                                    @if ($errors->has('password_confirmation'))
                                        <span>
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    Image
                                    <input class="form-control" type="file" name="image" value="{{old('image')}}" accept="image/*">
                                    @if ($errors->has('image'))
                                        <span>
                                            <strong>{{ $errors->first('image') }}</strong>
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

