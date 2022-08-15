@extends('admin.layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Update UPI</h3>
                        </div>
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <!-- /.card-header -->

                        <div class="card-body">

                            <form method="POST" action="{{ route('admin.bank.update') }}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id ?? '' }}">

                                <div class="form-group">
                                    <label for="upi_holder_name">UPI Holder Name<span class="required">*</span></label>
                                    <input type="text" name="upi_holder_name" class="form-control" value="{{$user->upi_holder_name}}" />
                                    @if ($errors->has('upi_holder_name'))
                                        <span class="required">
                                            <strong>{{ $errors->first('upi_holder_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="upi_id">UPI Id<span class="required">*</span></label>
                                    <input type="text" name="upi_id" class="form-control"  value="{{$user->upi_id}}"/>
                                    @if ($errors->has('upi_id'))
                                        <span class="required">
                                            <strong>{{ $errors->first('upi_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>

                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">UPI Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="form-group">
                                <label for="upi_holder_name">UPI Holder Name : {{$user->upi_holder_name}}</label>

                            </div>

                            <div class="form-group">
                                <label for="upi_holder_name">UPI Id : {{$user->upi_id}}</label>

                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
