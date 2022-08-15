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
              	<form method="POST" action="{{url('admin/add_money')}}">
              		@csrf
          		    <div class="form-group">
                        <label for="price">Enter Money<span class="required">*</span></label>
                        <input type="add_money" name="add_money" class="form-control" placeholder="Enter Money" />
                        <input type="hidden" name="user_id" value="{{$user->id ?? ''}}">
                        @if ($errors->has('add_money'))
                            <span class="required">
                                <strong>{{ $errors->first('add_money') }}</strong>
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