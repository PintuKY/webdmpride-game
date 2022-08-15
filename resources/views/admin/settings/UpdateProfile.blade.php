@extends('admin.layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Update Profile</h3>
                        </div>
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.update.details') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id ?? '' }}">

                                <div class="form-group">
                                    <label for="name">Name<span class="required">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" />
                                    @if ($errors->has('name'))
                                        <span class="required">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone<span class="required">*</span></label>
                                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" />
                                    @if ($errors->has('phone'))
                                        <span class="required">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">Email<span class="required">*</span></label>
                                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" />
                                    @if ($errors->has('email'))
                                        <span class="required">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="price">Profile Picture<span class="required">*</span></label>
                                    <input type="file" name="profile_photo" class="form-control" />
                                    @if ($errors->has('profile_photo'))
                                        <span class="required">
                                            <strong>{{ $errors->first('profile_photo') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Profile Details </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name : <span >{{$user->name}}</span> </label>


                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone :  {{$user->phone}}</label>

                                </div>
                                <div class="form-group">
                                    <label for="email">Email : {{$user->email}}</label>

                                </div>
                                <div class="form-group">
                                    <label for="price">Profile Picture : </label>
                                    <img src="{{ asset('storage/ProfilePic/'.$user->profile_photo) }}" class="img-circle elevation-2"
                            alt="User Image" width="100">

                                </div>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
