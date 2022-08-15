@extends('admin.layouts.auth')

@section('content')

<style>
    .banner__content{
        font-size: 1.825rem;
        text-shadow: 2px 2px 2px rgb(195 15 243 / 90%);
        margin-top: 0;
        margin-bottom: 15px;
        font-weight: 700;
        color: #fff;
    font-family: "Oswald", sans-serif;
    text-transform: uppercase;
    }

    .login__content{
        text-shadow: 2px 2px 2px rgb(195 15 243 / 90%);
        margin-top: 0;
        margin-bottom: 15px;
        font-weight: 50;
        color: #fff;
        font-family: "Oswald", sans-serif;
        /* text-transform: uppercase; */
    }
</style>
<div class="container" >
    <div class="row">
        <div class="col-md-4 col-md-offset-2">

        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body" style="padding-top: 150px;">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('reset.password.post') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="col-md-6">
                            @if(Session::has('flash_error'))
                                  <div class="alert alert-danger" style="color:#fff">
                                      <button type="button" class="close" data-dismiss="alert">×</button>
                                  {{ Session::get('flash_error') }}
                                  </div>
                            @endif
                            @if(Session::has('success'))
                                  <div class="alert alert-success" style="color:#fff">
                                      <button type="button" class="close" data-dismiss="alert">×</button>
                                  {{ Session::get('success') }}
                                  </div>
                            @endif
                            <div style="text-align: center;margin-top:-60px">
                                <img src="{{asset('assets/images/logo/logow.png')}}" width="150px;" alt="logo">
                            </div>
                            <h1 class="banner__content">Password Reset</h1>

                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" >
                            <label for="email" class="col-md-4 control-label login__content">Email</label>

                            <div class="col-md-6">
                                <input class="form-control" type="email"  name="email" id=""  placeholder="Email " required>
                                @if ($errors->has('email'))
                                    <span class="help-block" >
                                        <strong style="color:#fff">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label login__content">Password</label>

                            <div class="col-md-6">
                                <input class="form-control" type="password"  name="password" id="password1"  placeholder="Password " required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong style="color:#fff">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password_confirmation" class="col-md-4 control-label login__content">Confirm Password</label>

                            <div class="col-md-6">
                                <input class="form-control" type="password"  name="password_confirmation" id=""  placeholder="Confirm Password " required>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong style="color:#fff">{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <a href="{{url('admin/login')}}">Login</a>
                                        {{-- <input type="checkbox" name="remember"> Remember Me --}}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
