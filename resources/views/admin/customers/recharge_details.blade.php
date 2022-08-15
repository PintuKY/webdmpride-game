@extends('admin.layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recharge information </h3>
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
                      <th>User Name</th>
                      <th>Amount</th>
                      <th>Recharge Date</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach($recharge as $row)
                    <?php
                      $user = \App\User::where('id',$row->user_id)->first();
                    ?>
                    <tr>
                      <td>{{$user->name ?? ''}}</td>
                      
                      <td>{{$row->amount ?? ''}}</td>
                      <td>{{$row->created_at->format('d-m-y')}}</td>
                      
                      
                      <!-- <td>
                        <button form="resource-delete-{{ $row->id }}"><i style="color: red;" class="fas fa-trash-alt"></i></button>
                        <form id="resource-delete-{{ $row->id }}" action="{{ url('admin/deleteContacts') }}?id={{$row->id}}" style="display: inline-block;" onSubmit="return confirm('Are you sure you want to delete this item?');" method="post">
                          @csrf
                        </form>
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
