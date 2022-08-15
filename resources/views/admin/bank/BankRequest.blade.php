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
                                        <th>UPI</th>
                                        <th> Date</th>
                                        <th> Status</th>
                                        <th>Action</th>
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
                                                @if (($bank_request->bank_status == 0) ||($bank_request->upi_status == 0) )
                                                Pending
                                                @elseif (($bank_request->bank_status == 1) ||($bank_request->upi_status == 1))
                                                    Approved
                                                @elseif (($bank_request->bank_status == 2) ||($bank_request->upi_status == 2))
                                                    Rejected
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm update"
                                                id={{$bank_request->id }} user_id ={{$bank_request->user_id }}  >Update</button>
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
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Bank or UPI Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('admin.bank.permission') }}" method="POST">
                            @csrf
                            <div class="form-group row mb-0">
                                <input type="hidden" name="id" id="up_id" value="">
                                <input type="hidden" name="user_id" id="us_id" value="">
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
            $("#up_id").val(id);
            $("#us_id").val(user_id);

            $('#myModal').modal('show');
        });
    </script>
@endsection
