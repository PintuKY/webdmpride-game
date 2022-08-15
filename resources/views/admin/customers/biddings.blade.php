@extends('admin.layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card">
			   <form action="{{url('admin/search/{id}')}}" method="POST" role="search">
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
              <div class="card-header">
                <h3 class="card-title">Name:{{$user->name ?? ''}}</h3><br>
                <h2 class="card-title">Refer Id:{{$user->refer_id ?? ''}}</h2>
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
                      <th>Period</th>
                      <th>Wallet Amount</th>
                      <th>Refered By</th>
                      <th>Bidding Amount</th>
                      <th>Win Type</th>
                    </tr>
                  </thead>
                  <tbody>
					@if(!empty($biddings))
                    @foreach($biddings as $row)
                    <tr>
                      <td>{{$row->period ?? ''}}</td>
                      <td>{{$user->wallet_amount ?? ''}}</td>
                      <td>{{$user->refered_by ?? ''}}</td>
                      <td>{{$row->contract_money ?? ''}}</td>
                      @if(!empty($row->win_type))
                      <td>{{$row->win_type ?? ''}}</td>
                      @else
                      <td>Fail</td>
                      @endif
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
                {!! $biddings->links() !!}
				@endif  
              </div>
			 
              <!-- /.card-body -->
			  </form>    
        </div>
        <!-- /.card -->
        </div>
       </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection
