@extends('admin.layouts.app')
@section('content')
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Name: {{$user->name ?? ''}}</h3>
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
                      <th>Recharge Amount</th>
                      <th>Recharge Date</th>
                      <!-- <th></th> -->
                      <!-- <th>Action</th> -->
                    </tr> 
                  </thead> 
                  <tbody>
                    @foreach($recharge as $row)
                    <tr>
                      <td>{{ $row->amount }}</td>
                      <td>{{ $row->created_at->format('d-m-y') }}</td>
                      <!-- <td>
                        {{ $row->phone }}
                      </td> -->
                      
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <br>
                {!! $recharge->links() !!}
              </div>
              <!-- /.card-body -->
              
        </div>
        <!-- /.card -->
        </div>
       </div>
      </div><!-- /.container-fluid -->
    </section>

@endsection