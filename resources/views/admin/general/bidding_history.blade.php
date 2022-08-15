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
                  <div class="container">
                 <div class="card-body">
                 <table class="table table-bordered">
                 
                </table>
              </div>  
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>Period</th>
                      <th>Created At</th> 
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($period as $row)
                     <tr>
                     <td><a href="{{url('admin/bidding_details',$row->id)}}">{{$row->period}}</a></td>
                     <td>{{ @$row->created_at->format('d-m-y')}}</td>
                            
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
             {!! $period->links(); !!}
        <!-- /.card -->
        </div>
       </div>
      </div><!-- /.container-fluid -->
    </section>
<script>
  function current_period(){
$.ajax({
        url: '{{ url('admin/currentperiod') }}',
        method: "POST",
        dataType: "json",
        async: true,
        data: {_token: '{{ csrf_token() }}'},
        success: function (response) {
        var users = response.users;
        let len = response.len;
        if(users != ''){
          var bind = '';
          for(let i = 0; i<len; i++){
            let period = users[i].period;
            let contract_no = users[i].contract_no;
            let contract_money = users[i].contract_money;
            let win_type = users[i].win_type;
            let select_type = users[i].select_type;
            let color = users[i].color;


            bind += '<tr><td>'+period+'</td><td>'+contract_no+'</td><td>'+color+'</td><td>'+contract_money+'</td>'+'<td>'+win_type+'</td></tr>';
          }
          $('#set').html(bind);
        }        
        }
      });
  }
  </script>
@endsection
