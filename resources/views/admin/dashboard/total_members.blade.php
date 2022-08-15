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
              
             <!--  <div class="card-header">
                <form method="get">
                  <div class="container">
                    <div class="row">
                    
                  </div>
                </form>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>user Name</th>
                      <th>Contact Number</th>
                      <th>Wallet Amount</th>
                      <!--<th>Winner Type</th> -->
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($totaluser as $row)
                    <tr>
                     <td>{{$row->name}}</td>
                     <td>{{ $row->phone}}</td>
                     <td>{{ $row->wallet_amount}}</td>
                     <!--<td>{{ $row->payout}}</td>-->
                     <td>{{ $row->status}}</td>
                            
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
             {!! $totaluser->links() !!}
        <!-- /.card -->
        </div>
       </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- <script>
  $( function() {
    $( "#txtFromDate" ).datepicker();
    $( "#txtToDate" ).datepicker();
  } );
  </script> -->
@endsection
