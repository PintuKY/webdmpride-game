@extends('admin.layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Notification</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(Session::has('flash_success'))
                  <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_success') }}
                  </div>
              @endif
              <form role="form" id="myform" method="post" action="{{ route('notifications.store') }}">
                @csrf
                <div class="container">
                 <div class="row">
                    <div class="col-sm-12">
                          <div class="form-group">
                            <label for="price"> Heading <span class="required">*</span></label>
                            <input type="text" name="heading" id="heading" class="form-control" placeholder="Enter Heading" />
                            @if ($errors->has('heading'))
                                <span class="required">
                                    <strong>{{ $errors->first('heading') }}</strong>
                                </span>
                            @endif  
                          </div>
                          <div class="form-group">
                           <label for="percentage"> Content<span class="required">*</span></label>
                              <textarea placeholder="Enter Content" rows="5" class="form-control" name="content">{{old('content')}}</textarea>
                              @if ($errors->has('content'))
                                <span class="required">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                              @endif  
                          </div>
                           <div class="form-group">
                            <button id="submit" type="submit" class="btn btn-primary">Create</button>
                          </div>
                    </div>
                 </div>
                </div>
              </form>
          </div>
        </div>
       </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
