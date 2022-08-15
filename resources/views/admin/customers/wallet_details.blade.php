@extends('admin.layouts.app')
@section('content')
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Wallet : {{ $get_user_info->name ?? '' }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
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
              <form enctype="multipart/form-data" role="form" id="myform" method="post" action="{{ route('admin.customers.add_wallet') }}">
                @csrf
                <div class="container">
                 <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group"></div>
                      <div class="form-group">
                      	<h3>Wallet Credits : {{ $get_user_info->wallet_amount }}</h3>
                      </div>
                      <div class="form-group">
                        <label for="starting_from">Enter Amount <span class="required">*</span></label>
                        <input type="number" min="0" name="amount" id="amount" class="form-control" placeholder="Enter Amount" />
                        <input type="hidden" name="user_id" value="{{ $get_user_info->id }}">
                        @if ($errors->has('amount'))
                            <span class="required">
                                <strong>{{ $errors->first('amount') }}</strong>
                            </span>
                        @endif  
                      </div>
                      <div class="form-group">
                        <label for="starting_from">Enter Remarks <span class="required">*</span></label>
                        <textarea class="form-control" name="remarks" placeholder="Enter Remarks"></textarea>
                     
                      </div>
                      <div class="form-group">
                        <label for="price">Status <span class="required">*</span></label><br>
                          <label for="chkYes">
                            <input type="radio" class="status" value="Credit" name="type" checked="" />
                            @if ($errors->has('status'))
                              <span class="required">
                                  <strong>{{ $errors->first('status') }}</strong>
                              </span>
                          @endif  
                            Credit
                        </label>
                        <label for="chkNo">
                            <input type="radio" class="status" value="Debit" name="type"/>
                            @if ($errors->has('status'))
                              <span class="required">
                                  <strong>{{ $errors->first('status') }}</strong>
                              </span>
                          @endif  
                            Debit
                        </label>
                      </div>
                       <div class="form-group">
                        <button id="submit" type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                 </div>
                </div>
              </form>
          </div>
    		<div class="card card-primary">
            	<div class="card-body">
	                <table class="table table-bordered">
	                  <thead>                  
	                    <tr>
	                      <!-- <th>Logo</th> -->
	                      
	                      <th>Amount</th>
	                      <th>Type</th>
                        <th>Remarks</th>
	                      <th>Transaction ID</th>
	                      <th>Transaction Time</th>
	                    </tr> 
	                  </thead> 
	                  <tbody>
	                    @foreach($transcations as $row)
	                    <tr>
	                      <td>{{ $row->amount }}</td>
	                      <td>
	                        @if($row->type == 'Credit')
	                        <span class="label label-success">{{ $row->type }}</span>
	                        @else
	                        <span class="label label-danger">{{ $row->type }}</span>
	                        @endif
	                      </td>
                        <td>
                          {!! $row->remarks !!}
                        </td>
	                      <td>{{ $row->transaction_id }}</td>
	                      <td>{{ date('d/m/Y h:i A',strtotime($row->created_at)) }}</td>
	                    </tr>
	                    @endforeach
	                  </tbody>
	                </table>
	                <br>
	                {!! $transcations->links() !!}
	            </div>
            </div>
        	</div>
       </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection