@extends('admin.layouts.app')
@section('content')
<!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://code.jquery.com/resources/demos/style.css"> -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card">
            @if(Session::has('flash_success'))
                  <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_success') }}
                  </div>
              @endif
              
              <div class="card-header">
                <form method="get">
                  <div class="container">
                    <div class="row">
                    <!-- <div class="form-group col-md-2">
                        <label>Report Type</label>
                        <select class="form-control" name="report_type">
                            <option @if(@$_REQUEST['report_type'] == 'none') selected @endif value="none">None</option>
                            <option @if(@$_REQUEST['report_type'] == 'pdf') selected @endif value="pdf">PDF</option>
                            <option @if(@$_REQUEST['report_type'] == 'csv') selected @endif value="csv">CSV</option>
                            <option @if(@$_REQUEST['report_type'] == 'excel') selected @endif value="excel">XLSX</option>
                        </select>
                    </div> -->
                    <!-- <div class="form-group col-md-3">
                      <label for="status">Order Status:</label>
                      <select name="status" id="status" class="form-control">
                        <option value="all" @if(@$_REQUEST['status'] == 'all') selected @endif>All</option>
                        <option value="order_received" @if(@$_REQUEST['status'] == 'order_received') selected @endif>Order Received</option>
                        <option value="order_preparing" @if(@$_REQUEST['status'] == 'order_preparing') selected @endif>Order Preparing</option>
                        <option value="ontheway" @if(@$_REQUEST['status'] == 'ontheway') selected @endif>Order Ontheway</option>
                        <option value="delivered" @if(@$_REQUEST['status'] == 'delivered') selected @endif>Order Delivered</option>
                        <option value="cancelled" @if(@$_REQUEST['status'] == 'cancelled') selected @endif>Order Cancelled</option>
                      </select> 
                    </div> -->
                    <?php
                      $from_date =  @$_REQUEST['from_date']; 
                      $to_date =  @$_REQUEST['to_date']; 
                      $to_date =  @$_REQUEST['to_date']; 
                    ?>
                    <!-- <div class="form-group col-md-2">
                        <label for="txtFromDate">From:</label>
                       <input type="text" id="txtFromDate" class="form-control" name="from_date" placeholder="From Date" autocomplete="off" @if(@$_REQUEST['from_date']) value="{{$from_date}}" @endif>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="txtToDate">To:</label>
                       <input type="text" id="txtToDate" class="form-control" name="to_date" placeholder="To Date" autocomplete="off" @if(@$_REQUEST['to_date']) value="{{$to_date}}" @endif>
                    </div>
                    <div class="form-group col-md-2">
                      <label for="txtToDate" style="color: white;">To:</label>
                      <input type="submit" name="filter" class="form-control btn btn-primary" value="Filter">
                    </div> -->
                  </div>
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>user Name</th>
                      <th>Contact Number</th> 
                      <th>Number</th>
                      <th>Winner</th>  
                      <th>Bidding Amount (Rs)</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($bidding_details as $bidding)
                    <?php 
                    
                    $user = \App\User::where('id',$bidding->userid)->first();
                    ?>
                     <tr class="<?php if($bidding->win_type=='winner'){echo 'bg-winner';}else{} ?>">
                     <td>{{$user->name}}</td>
                     <td>{{ $user->phone}}</td>
                     <td>	@if($bidding->color=='red')
							<button class="btn btn-default btn-sm partityresult red">{{$bidding->contract_no?$bidding->contract_no:''}}</button></td>
							@elseif($bidding->color=='green')
							<button class="btn btn-default btn-sm partityresult green">{{$bidding->contract_no?$bidding->contract_no:''}}</button></td>
							@elseif($bidding->color=='violet')
							<button class="btn btn-default btn-sm partityresult violet">{{$bidding->contract_no?$bidding->contract_no:''}}</button></td>
							@endif
                     <td>{{ $bidding->win_type}}</td>
                     <td>{{ $bidding->contract_money}}</td>
                            
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
             
        <!-- /.card -->
        </div>
       </div>
      </div><!-- /.container-fluid -->
    </section>
<style>
     .partityresult {
     /* background-color: #7f00ff; */
	 width: 35px;
     height: 35px;
	 border-radius:50%;
	 color:#fff;
	 
   }
   
   	.partityresult:hover {
     background-color: #7f00ff;
   
	 }

	.partityresult.red{
		background-color:red;
	}

	.partityresult.violet{
		background-color:#7f00ff;
	}
	.partityresult.green{
		background-color:green;
	}
	
	.bg-winner{
	    background: #085c08;
        color: white;
	}

</style>
@endsection
