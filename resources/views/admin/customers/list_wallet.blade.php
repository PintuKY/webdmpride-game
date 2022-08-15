@extends('admin.layouts.app')
@section('content')
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Customers Wallet Transactions</h3>
              </div>
              @if(Session::has('flash_success'))
                  <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_success') }}
                  </div>
              @endif
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <!-- <th>Logo</th> -->
                      <th>Customer Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Action</th>
                    </tr> 
                  </thead> 
                  <tbody>
                    @foreach($user_info as $row)
                    <tr>
                      <td>{{ $row->name }}</td>
                      <td>{{ $row->email }}</td>
                      <td>
                        {{ $row->phone }}
                      </td>
                      <td>
                        <a href="{{ route('admin.customers.wallet_details', $row->id) }}" class="btn btn-primary">Show</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <br>
                {!! $user_info->links() !!}
              </div>
              <!-- /.card-body -->
              
        </div>
        <!-- /.card -->
        </div>
       </div>
      </div><!-- /.container-fluid -->
    </section>

@endsection