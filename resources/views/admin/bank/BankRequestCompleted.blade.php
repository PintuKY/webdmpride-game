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

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Phone</th>
                                        <th>Bank Detals</th>
                                        <th>Upi Details</th>
                                        <th>Requested Date</th>
                                        <th>Updated Date</th>
                                        <th> Status</th>
                                    </tr>
                                    @foreach ($bank_requests as $bank_request)
                                        <tr>
                                            <td>{{$bank_request->user->name}}</td>
                                            <td>{{$bank_request->phone}}</td>
                                            <td>
                                                @if ($bank_request->bank_account_no)
                                                Account No : {{$bank_request->bank_account_no}}<br>
                                                Bank Name : {{$bank_request->bank_name}}<br>
                                                Branch Name : {{$bank_request->bank_branch}}<br>
                                                IFSC Code : {{$bank_request->ifsc_code}}
                                                @else
                                                ---
                                                @endif

                                            </td>
                                            <td>
                                                @if ($bank_request->upi_holder_name)
                                                Name : {{$bank_request->upi_holder_name}}<br>
                                                UPI Id : {{$bank_request->upi_id}}<br>
                                                @else
                                                ---
                                                @endif

                                            </td>
                                            <td> {{$bank_request->created_at->format('d/m/Y')}}</td>
                                            <td>
                                                {{$bank_request->updated_at->format('d/m/Y')}}
                                            </td>
                                            <td>
                                                @if (($bank_request->bank_status == 0) ||($bank_request->upi_status == 0) )
                                                Pending
                                                @elseif (($bank_request->bank_status == 1) ||($bank_request->upi_status == 1))
                                                    Approved
                                                @elseif (($bank_request->bank_status == 2) ||($bank_request->upi_status == 2))
                                                    Rejected
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
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
