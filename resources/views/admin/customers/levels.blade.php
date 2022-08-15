@extends('admin.layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
          @if(Session::has('flash_success'))
              <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert">×</button>
              {{ Session::get('flash_success') }}
              </div>
          @endif
          @if(Session::has('flash_error'))
              <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
              {{ Session::get('flash_error') }}
              </div>
          @endif
        <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
<!--             <form action="{{url('admin/search')}}" method="POST" role="search">
                {{ csrf_field() }}
                <div class="col-4">
                <div class="input-group">
                    <input type="text" class="form-control" name="q"
                        placeholder="Search users"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search">Search</span>
                        </button>
                    </span>
                </div>
                </div>
             </form> -->
				<div class="card">
               <table class="table table-bordered" style="margin:10px;">
				   <tr>
					   <td><b>Name</b></td>
					   <td>{{$user_info->name}}</td>
				   </tr>
				   <tr>
					   <td><b>Refer Id</b></td>
					   <td>{{$user_info->refer_id}}</td>
				   </tr>
				   <tr>
					   <td><b>Phone</b></td>
					   <td>{{$user_info->phone}}</td>
				   </tr>
				</table>
				</div>
              <div class="card-header d-flex p-0">
                
                <ul class="nav nav-pills p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Level 1</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Level 2</a></li>
                  <li class="nav-item dropdown"></li>
                </ul>
              </div><!-- /.card-header -->
             
       
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                      
                      <table class="table table-bordered">
                        <thead>                  
                          <tr>
                            <th>Name</th>
                            <th>Recharge Status</th>
							<th>Refer Id</th>
							<th>Contact. No</th>
                            <th>Joined on</th>
                          </tr> 
                        </thead>
                        <tbody>
                          @if($list_level1->total() > 0)
                            @foreach($list_level1 as $l1 => $list1)
                            <tr>
                              <td>{{$list1->name}}</td>
                              <td>@if($list1->check_admin_referer_bonus($user_id) == '1')
                                  <span class="label label-success">Recharged</span>
                                @else
                                  <span class="label label-danger">Not Recharged</span>
                                @endif
                              </td>
								<td>{{$list1->refer_id}}</td>
								<td>{{$list1->phone}}</td>
                              <td>{{date('d/m/Y',strtotime($list1->created_at))}}</td>
                            </tr>
                            @endforeach
                          @endif
                        </tbody>
                      </table>
                      <br>
                      {!!$list_level1->links()!!}
                      
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    
                    <table class="table table-bordered">
                        <thead>                  
                          <tr>
                            <th>Name</th>
                            <th>Recharge Status</th>
							<th>Refer Id</th>
							<th>Contact. No</th>
                            <th>Joined on</th>
                          </tr> 
                        </thead>
                        <tbody>
                          @if($list_level2->total() > 0)
                            @foreach($list_level2 as $l1 => $list1)
                            <tr>
                              <td>{{$list1->name}}</td>
								
                              <td>@if($list1->check_admin_referer_level2($list1->id) == '1')
                                  <span class="label label-success">Recharged</span>
                                @else
                                  <span class="label label-danger">Not Recharged</span>
                                @endif
                              </td>
								<td>{{$list1->refer_id}}</td>
								<td>{{$list1->phone}}</td>
                              <td>{{date('d/m/Y',strtotime($list1->created_at))}}</td>
                            </tr>
                            @endforeach
                          @endif
                        </tbody>
                      </table>
                      <br>
                      {!!$list_level2->links()!!}
                  </div>
                  <!-- /.tab-pane -->

                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
           
              
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
       
      </div><!-- /.container-fluid -->
    </section>
@endsection
