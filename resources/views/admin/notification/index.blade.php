@extends('admin.layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Notification</h3>
                <a href="{{route('notifications.create')}}" class="btn btn-primary float-right">Create</a>
              </div>
              @if(Session::has('flash_success'))
                  <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_success') }}
                  </div>
              @endif
              @if(Session::has('flash_error'))
                  <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_error') }}
                  </div>
              @endif
              <!-- /.card-header -->

              @foreach($data as $row)
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-3">
                <div class="mdc-card o-hidden" style="background: #ccc;">
                  <div class="p-3">
                    <h3 class="fw-600">{{@$row->heading}}</h3> 
                    <p>{{@$row->content}}</p>
                  </div>  
                </div> 
              </div>
              <hr/>
              @endforeach
                     {!! $data->links() !!}
              
             <!--  <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>Heading</th>
                      <th>Content</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr> 
                  </thead>
                  <tbody>
                    @foreach($data as $row)
                    <tr>
                      <td>{{@$row->heading}}</td>
                      <td>{{@$row->content}}</td>
                      <td>{{@$row->is_read}}</td>
                      <td>
                        <a href="{{ route('notifications.edit', $row->id) }}" class="btn"><i class="fas fa-edit" style="color: blue;"></i></a>
                        <button form="resource-delete-{{ $row->id }}"><i style="color: red;" class="fas fa-trash-alt"></i></button>
                        <form id="resource-delete-{{ $row->id }}" action="{{ route('notifications.destroy', $row->id) }}" style="display: inline-block;" onSubmit="return confirm('Are you sure you want to delete this item?');" method="post">
                          @csrf
                          @method('DELETE')
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <br>
                {!! $data->links() !!}
              </div> -->
              <!-- /.card-body -->
              
        </div>
        <!-- /.card -->
        </div>
       </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection
