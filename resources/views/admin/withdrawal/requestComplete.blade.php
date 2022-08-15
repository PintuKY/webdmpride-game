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
                                        <th>User Name</th>
                                        <th>Phone</th>
                                        <th>Request No</th>
                                        <th>Amount </th>
                                        <th>Bank </th>
                                        <th>Upi </th>
                                        <th>Requested Date</th>
                                        <th>Updated Date</th>
                                        <th> Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($withdrawal_requests as $withdrawal_request )
                                    <tr>
                                        <td>{{$withdrawal_request->user->name}}</td>
                                        <td>{{$withdrawal_request->user->phone}}</td>
                                        <td>{{$withdrawal_request->req_id}}</td>
                                        <td>Rs. {{$withdrawal_request->amount}}</td>
                                        <td>
                                            @if ($withdrawal_request->user->bank_name)
                                            Account No :  {{$withdrawal_request->user->bank_account_no}},
                                            Bank Name : {{$withdrawal_request->user->bank_name}},
                                            Branch :   {{$withdrawal_request->user->bank_branch}},
                                            IFSC Code   {{$withdrawal_request->user->ifsc_code}}
                                            @else
                                                ---
                                            @endif
                                        </td>
                                        <td>
                                            @if ($withdrawal_request->user->upi_holder_name)
                                            Name :  {{$withdrawal_request->user->upi_holder_name}},
                                            UPI Id : {{$withdrawal_request->user->upi_id}},
                                            @else
                                                ---
                                            @endif
                                        </td>
                                        <td>
                                            {{$withdrawal_request->created_at->format('d/m/Y')}}
                                        </td>
                                        <td>
                                            {{$withdrawal_request->updated_at->format('d/m/Y')}}
                                        </td>
                                        <td>

                                            @if ($withdrawal_request->req_stat == 1)
                                                Approved
                                            @else
                                                Rejected
                                            @endif

                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        {{ $withdrawal_requests->links("pagination::bootstrap-4") }}
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
