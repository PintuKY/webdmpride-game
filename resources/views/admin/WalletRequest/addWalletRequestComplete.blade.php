@extends('admin.layouts.app')
@section('content')

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


                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Phone</th>
                                        <th>Request No</th>
                                        <th>Amount </th>
                                        <th>Bank Detals</th>
                                        <th>Upi Details</th>
                                        <th>Requested Date</th>
                                        <th>Updated Date</th>
                                        <th> Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wallet_requests as $wallet_request )
                                        <tr>
                                            <td>{{$wallet_request->user->name}}</td>
                                            <td>{{$wallet_request->user->phone}}</td>
                                            <td>{{$wallet_request->req_id}}</td>
                                            <td>Rs. {{$wallet_request->amount}}</td>
                                            <td>
                                                @if ($wallet_request->user->bank_name)
                                                Account No :  {{$wallet_request->user->bank_account_no}}<br>
                                                Bank Name : {{$wallet_request->user->bank_name}}<br>
                                                Branch :{{$wallet_request->user->bank_branch}}<br>
                                                IFSC Code :{{$wallet_request->user->ifsc_code}}
                                                @else
                                                    ---
                                                @endif
                                            </td>
                                            <td>
                                                @if ($wallet_request->user->upi_holder_name)
                                                Name :  {{$wallet_request->user->upi_holder_name}}<br>
                                                UPI Id : {{$wallet_request->user->upi_id}}<br>
                                                @else
                                                    ---
                                                @endif
                                            </td>
                                            <td>
                                                {{$wallet_request->created_at->format('d/m/Y')}}
                                            </td>
                                            <td>
                                                {{$wallet_request->updated_at->format('d/m/Y')}}
                                            </td>
                                            <td>
                                                @if ($wallet_request->req_stat == 1)
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
                        {{ $wallet_requests->links("pagination::bootstrap-4") }}
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
    </section>
    {{-- <script>
        $(function() {
            $("#txtFromDate").datepicker();
            $("#txtToDate").datepicker();
        });
    </script> --}}
@endsection
