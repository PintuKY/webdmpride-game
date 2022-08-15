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
            @if(Session::has('message'))
                <div class="alert alert-success;" style="color:#fff">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                {{ Session::get('message') }}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-body" style="padding-top: 150px;">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('forget.password.post') }}">
                        {{ csrf_field() }}
                        <div class="col-md-6">

                            <div style="text-align: center;margin-top:-60px">
                                <img src="{{asset('assets/images/logo/logow.png')}}" width="150px;" alt="logo">
                            </div>
                            <h1 class="banner__content">Forget Password</h1>

                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label login__content">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Email" autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
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

                                <!-- <a class="btn btn-link" href="{{ url('/admin/password/reset') }}">
                                    Forgot Your Password?
                                </a> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
