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
                                        <th>Amount Requested</th>
                                        <th>Bank Detals</th>
                                        <th>Upi Details</th>
                                        <th>Requested Date</th>
                                        <th> Status</th>
                                        <th>Update Stauts</th>

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
                                                Branch :   {{$wallet_request->user->bank_branch}}<br>
                                                IFSC Code   {{$wallet_request->user->ifsc_code}}
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
                                                {{$wallet_request->created_at->format('d/m/Y')}}</td>
                                            <td>
                                                @if ($wallet_request->req_stat == 0)
                                                        Pending
                                                @elseif ($wallet_request->req_stat == 1)
                                                    Approved
                                                @elseif ($wallet_request->req_stat == 2)
                                                    Rejected
                                                @endif

                                            </td>
                                            <td>
                                                {{-- <button type="button" class="btn btn-primary">Update</button> --}}
                                                <button type="button" class="btn btn-primary btn-sm update"
                                                id={{$wallet_request->id }} user_id ={{$wallet_request->user_id }} rq_money={{$wallet_request->amount}}>Update</button>
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

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Add Money Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.wallet.permission') }}" method="POST">
                            @csrf
                            <div class="form-group row mb-0">
                                <input type="hidden" name="id" id="up_id" value="">
                                <input type="hidden" name="user_id" id="us_id" value="">
                                <input type="hidden" name="amount" id="to_mn" value="">
                                <label class="col-md-3 col-form-label"> Select</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="status" required>
                                        <option value="">Select Permission</option>
                                        <option value="1">Approved</option>
                                        <option value="2">Rejected</option>
                                    </select>

                                </div>
                            </div><br>
                            {{-- <div class="form-group row mb-0">
                                <label class="col-md-3 col-form-label"> Reasons</label>
                                <div class="col-md-9">
                                    <textarea name="reasons" id="" cols="30" rows="5" placeholder="Mention reasons" class="form-control"
                                        required></textarea>
                                </div>
                            </div> --}}

                            <div class="modal-footer">
                                <button type="Submit" class="btn btn-primary">Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal closed -->

    <script>
        $('.update').click(function() {
            var id = $(this).attr('id');
            var user_id = $(this).attr('user_id');
            var rq_money = $(this).attr('rq_money')
            $("#up_id").val(id);
            $("#us_id").val(user_id);
            $('#to_mn').val(rq_money);
            $('#myModal').modal('show');
        });
    </script>
@endsection
