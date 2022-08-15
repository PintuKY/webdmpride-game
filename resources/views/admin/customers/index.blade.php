@extends('admin.layouts.app')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (Session::has('flash_success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ Session::get('flash_success') }}
                        </div>
                    @endif

                    <div class="card-header">
                        <form method="get">
                            <div class="container">
                                <div class="row">



                                </div>
                        </form>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User Name</th>
                                    <th>Phone</th>
                                    <th>Refered By</th>
                                    <th>Wallet Amount</th>

                                </tr>
                            </thead>
                            <tbody>

                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->refered_by}}</td>
                                    <td>{{$user->wallet_amount}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                    {{ $users->links("pagination::bootstrap-4") }}
                    <!-- /.card-body -->

                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
</section>

@endsection
