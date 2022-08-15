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
                                        <th> Status</th>
                                        <th>Action</th>

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
                                            @if ($withdrawal_request->req_stat == 0)
                                                    Pending
                                            @elseif ($withdrawal_request->req_stat == 1)
                                                Approved
                                            @elseif ($withdrawal_request->req_stat == 2)
                                                Rejected
                                            @endif

                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm update"
                                            id={{$withdrawal_request->id }} user_id ={{$withdrawal_request->user_id }} rq_money={{$withdrawal_request->amount}} >Update</button>
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

     <!-- Modal -->
     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Update Withdrawl Money Request</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="card-body">
                     <form class="form-horizontal" action="{{ route('admin.withdrawals.permission') }}" method="POST">
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
