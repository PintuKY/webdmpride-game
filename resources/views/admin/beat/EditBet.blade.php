@extends('admin.layouts.app')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Bet</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <form enctype="multipart/form-data" role="form" id="myform" method="post"
                        action="{{ route('bet.Update') }}">
                        @csrf
                        <input type="hidden" name="id"  value="{{$bet->id}}" id="">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="bets_type">Bet Type</label>
                                        <div class="input-group">
                                            <div class="custom-file">


                                                <input type="text" name="bets_type" id="" class="form-control" value="{{$bet->bets_type}}" readonly>


                                            </div>

                                        </div>
                                    </div>
                                    <div>
                                        @if ($errors->has('bets_type'))
                                            <span class="required">
                                                <strong>{{ $errors->first('bets_type') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    @if ($bet->bets_type == 'Sum Type')


                                    <div class="form-group hide" id="sum_type1">
                                        <label for="bets_sequence">Bet Sequence</label>
                                        <div class="input-group">
                                            <div class="custom-file">

                                                <input type="text" name="bets_sequence" id="" class="form-control" value="{{$bet->bets_sequence}}" readonly>
                                            </div>

                                            <div>
                                                @if ($errors->has('bets_sequence'))
                                                    <span class="required">
                                                        <strong>{{ $errors->first('bets_sequence') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="form-group hide" id="sum_number1">
                                        <label for="bets_numbers">Bet Number</label>
                                        <div class="input-group">
                                            <div class="custom-file">


                                                <input type="text"  name="bets_numbers" id="" class="form-control" value="{{$bet->bets_numbers}}" readonly>
                                                @if ($errors->has('bets_numbers'))
                                                    <span class="required">
                                                        <strong>{{ $errors->first('bets_numbers') }}</strong>
                                                    </span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                @endif
{{--
                                    <div class="form-group">
                                        <label for="bets_color">Bet Color</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <select name="bets_color" id="" class="form-control">
                                                    <option value="">Select Bet Color</option>
                                                    <option value="#ffa500">Orange</option>
                                                    <option value="#ff0000">Red</option>
                                                    <option value="#0000ff">Blue</option>
                                                    <option value="#008000">Green</option>
                                                    <option value="#ffff00">Yellow</option>
                                                </select>


                                            </div>

                                        </div>
                                    </div>
                                    <div>
                                        @if ($errors->has('bets_color'))
                                            <span class="required">
                                                <strong>{{ $errors->first('bets_color') }}</strong>
                                            </span>
                                        @endif
                                    </div> --}}

                                    <div class="form-group">
                                        <label for="bets_odds">Bet Odds</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" name="bets_odds" class="form-control numbersOnly"
                                                  value="{{$bet->bets_odds}}">


                                            </div>

                                        </div>
                                    </div>
                                    <div>
                                        @if ($errors->has('bets_odds'))
                                            <span class="required">
                                                <strong>{{ $errors->first('bets_odds') }}</strong>
                                            </span>
                                        @endif
                                    </div>


                                    <label for="chkYes">
                                        <input type="radio" class="status" value="1" name="status" checked />
                                        @if ($errors->has('status'))
                                            <span class="required">
                                                <strong>{{ $errors->first('status') }}</strong>
                                            </span>
                                        @endif
                                        Active
                                    </label>
                                    <label for="chkNo">
                                        <input type="radio" class="status" value="0" name="status" />
                                        @if ($errors->has('status'))
                                            <span class="required">
                                                <strong>{{ $errors->first('status') }}</strong>
                                            </span>
                                        @endif
                                        Inactive
                                    </label>
                                    <div class="form-group">
                                        <button id="submit" type="submit" class="btn btn-primary">Edit
                                            Bet</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<script>
     $('.numbersOnly').keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g,'');
        });
</script>
@endsection
