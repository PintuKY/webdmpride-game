@extends('admin.layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

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


                                    <?php
                                    $from_date = @$_REQUEST['from_date'];
                                    $to_date = @$_REQUEST['to_date'];
                                    $to_date = @$_REQUEST['to_date'];
                                    ?>

                                </div>
                        </form>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Phone</th>
                                    <th>Amount Requested</th>
                                    <th>Bank Detals</th>
                                    <th>Upi Details</th>
                                    <th>Requested Date</th>
                                    <th> Status</th>
                                    <th>Update Stauts</th>

                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->

                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
</section>
<script>
    $(function() {
        $("#txtFromDate").datepicker();
        $("#txtToDate").datepicker();
    });
</script>
@endsection
