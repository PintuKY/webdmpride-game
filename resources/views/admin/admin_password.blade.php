@extends('admin.layouts.app')
@section('content')
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{$user->name}}</h3>
              </div>
              @if(Session::has('flash_success'))
                  <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_success') }}
                  </div>
              @endif
              <!-- /.card-header -->
              <div class="card-body">
              	<form method="POST" action="{{route('updatepass')}}">
              		@csrf
          		    <div class="form-group">
                        <label for="price">New password<span class="required">*</span></label>
                        <input type="password" name="new_password" class="form-control" placeholder="Enter New Password" />
                        <input type="hidden" name="user_id" value="{{$user->id ?? ''}}">
                        @if ($errors->has('new_password'))
                            <span class="required">
                                <strong>{{ $errors->first('new_password') }}</strong>
                            </span>
                        @endif  
                    </div>
                    <div class="form-group">
                        <label for="price">Confirm password<span class="required">*</span></label>
                        <input type="password" name="confirm_password" class="form-control" placeholder="Enter Confirm password" />
                        @if ($errors->has('confirm_password'))
                            <span class="required">
                                <strong>{{ $errors->first('confirm_password') }}</strong>
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
       </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection