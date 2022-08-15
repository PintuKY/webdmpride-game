@extends('admin.layouts.app')
@section('content')
    <!-- Main content -->
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
              <div class="alert alert-success" id="update_success" style="display:none"></div>
              <div class="alert alert-danger" id="update_error" style="display:none"></div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table">
                <form role="form" id="myform" method="post" action=" {{route('customers.update',$user->id)}}">
                 @csrf
                 @method('PATCH')
                   <div class="col-sm-12">
                          <div class="form-group">
                            <label for="price">Name</label>
                            <input type="text" value="{{$user->name}}" name="name" id="question" class="form-control" placeholder="Enter name" />
                            <!-- @if ($errors->has('name'))
                                <span class="required">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif   -->
                          </div>
                          <div class="form-group">
                            <label for="price">Email</label>
                            <input type="email" value="{{$user->email}}" name="email" id="question" class="form-control" placeholder="Enter email" />
                           <!--  @if ($errors->has('email'))
                                <span class="required">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif   -->
                          </div>
                          <div class="form-group">
                            <label for="price">Contact Number</label>
                            <input type="phone" value="{{$user->phone}}" name="phone" id="question" class="form-control" placeholder="Enter Contact Number" />
                           <!--  @if ($errors->has('phone'))
                                <span class="required">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif   -->
                          </div>

                    </div>
                         
                  <!-- <tbody> -->
                    <!-- <tr>
                      <td><strong>Name</strong></td>
                      <td>{{@$user->name}}</td>
                    </tr>
                    <tr>
                      <td><strong>Phone</strong></td>
                      <td>{{@$user->phone}}</td>
                    </tr>
                    <tr>
                      <td><strong>Email</strong></td>
                      <td>{{@$user->email}}</td>
                    </tr> -->
                    
                      <td><strong>Active status</strong></td>
                      <td>
                        <div class="form-group">
                          <label for="chkYes">
                            <input type="radio" class="status verify_customer" value="1" name="status" @if($user->status == 1) checked @endif />
                            @if ($errors->has('status'))
                              <span class="required">
                                  <strong>{{ $errors->first('status') }}</strong>
                              </span>
                          @endif  
                            Active
                        </label>
                        <label for="chkNo">
                            <input type="radio" class="status verify_customer" value="0" name="status" @if($user->status == 0) checked @endif/>
                            @if ($errors->has('status'))
                              <span class="required">
                                  <strong>{{ $errors->first('status') }}</strong>
                              </span>
                          @endif  
                            Inactive
                        </label>
                        </div>
                      </td>
                    </tr>
                   <!-- <tr>
                      <td><strong>Address</strong></td>
                      <td>{{@$profile->address}}</td>
                    </tr>
                    <tr>
                      <td><strong>Country</strong></td>
                      <td>{{@$profile->country}}</td>
                    </tr>
                    <tr>
                      <td><strong>State</strong></td>
                      <td>{{@$profile->state}}</td>
                    </tr>
                    <tr>
                      <td><strong>City</strong></td>
                      <td>{{@$profile->city}}</td>
                    </tr>
                    <tr>
                      <td><strong>Pincode</strong></td>
                      <td>{{@$profile->pincode}}</td>
                    </tr>-->
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
        </div>
        <!-- /.card -->
		<div class="form-group">
         <button id="submit" type="submit" class="btn btn-primary">Update</button>
		<a href="{{url('/admin/customers')}}" type="submit" class="btn btn-primary">Back</a>
        </div>
       </form> 
       <!--<div class="form-group">
            <a href="{{url('/admin/customers')}}" type="submit" class="btn btn-primary">Back</a>
        </div>-->
        </div>
         
       </div>
      </div><!-- /.container-fluid -->
    </section>
<script type="text/javascript">
  $(document).ready(function(){
      var user_id = "{{$user->id}}";
      var site_url = "{{url('/')}}";
     
      $(".verify_customer").on('change',function() {
         var status = $(this).val();
        $.ajax({
            url: site_url+'/admin/verify_customers',
            method: "POST",
            data: {_token: '{{ csrf_token() }}', "userid":user_id,"status":status},
            dataType: "json",
            success: function (response) {
              if(response.status == 1){
                $("#update_success").show();
                $("#update_success").text(response.text);
                $("#update_error").hide();
              }else{
                $("#update_error").show();
                $("#update_success").hide();
                $("#update_error").text(response.text);
              }

            }
        });
      })
  })
</script>
@endsection
