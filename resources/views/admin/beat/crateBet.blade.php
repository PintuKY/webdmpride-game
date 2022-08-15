@extends('admin.layouts.app')
@section('content')
    <style>
        .hide {
            display: none;
        }
    </style>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Bet</h3>
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
                            action="{{ route('bet.create') }}">
                            @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="bets_type">Bet Type</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <select name="bets_type" id="drop_down" class="form-control">
                                                        <option value="">Select Bet Type</option>
                                                        <option value="Sum Type">Sum Type</option>
                                                        <option value="Sum Number">Sum Number</option>
                                                    </select>


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

                                        <div class="form-group hide" id="sum_type1">
                                            <label for="bets_sequence">Bet Sequence</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <select name="bets_sequence" id="bets_sequence1" class="form-control ">
                                                        <option value="">Select Bet Sequence</option>
                                                        {{-- <option value="Pride">Pride</option> --}}
                                                        <option value="1-5">1-5</option>
                                                        <option value="6-10">6-10</option>
                                                        <option value="11-15">11-15</option>
                                                        <option value="16-20">16-19</option>
                                                    </select>




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

                                        <div class="form-group hide" id="sum_number1">
                                            <label for="bets_numbers">Bet Number</label>
                                            <div class="input-group">
                                                <div class="custom-file">

                                                    <select name="bets_numbers" id="bets_numbers1" class="form-control">
                                                        <option value="">Select Bet Number</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="Pride">Pride</option>
                                                    </select>
                                                    @if ($errors->has('bets_numbers'))
                                                        <span class="required">
                                                            <strong>{{ $errors->first('bets_numbers') }}</strong>
                                                        </span>
                                                    @endif

                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group" style=" display: none;">
                                            <label for="bet_angel">Bet Angel</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="hidden" name="bet_angel" id="bet_angel1" class="form-control" >
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="bets_color">Bet Color</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <select name="bets_color" id="" class="form-control">
                                                        <option value="">Select Bet Color</option>
                                                        {{-- <option value="#ffa500">Orange</option> --}}
                                                        <option value="#ff0000">Red</option>
                                                        <option value="#0000ff">Blue</option>
                                                        <option value="#008000">Green</option>
                                                        <option value="#ffff00">Yellow</option>
                                                        {{-- <option value="#ffa500">Orange</option> --}}
                                                        <option value="#000000">Black</option>
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
                                        </div>

                                        <div class="form-group">
                                            <label for="bets_odds">Bet Odds</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="text" name="bets_odds" class="form-control numbersOnly"
                                                        placeholder="Enter Bet Odds">


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
                                            <button id="submit" type="submit" class="btn btn-primary">Create
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
        $(document).ready(function() {
            $('#drop_down').change(function() {
                var dropDown = $(this).val();
                if (dropDown == 'Sum Type') {
                    $('#sum_type1').show();
                    $('#sum_number1').hide();
                }
                if (dropDown == 'Sum Number') {
                    $('#sum_number1').show();
                    $('#sum_type1').hide();
                }
            })
        });
        // numbers only
        $('.numbersOnly').keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g,'');
        });


        // bit angel sum number
        $(document).ready(function() {
            $('#bets_numbers1').change(function() {
                var dropDown = $(this).val();
                var angel1= "0-17";
                var angel2= "17-35";
                var angel3= "35-53";
                var angel4= "53-71";
                var angel5= "71-89";
                var angel6= "89-107";
                var angel7= "107-125";
                var angel8= "125-143";
                var angel9= "143-161";
                var angel10= "161-179";
                var angel11= "179-197";
                var angel12= "197-215";
                var angel13= "215-233";
                var angel14= "233-251";
                var angel15= "251-269";
                var angel16= "269-287";
                var angel17= "287-305";
                var angel18= "305-323";
                var angel19= "323-341";
                var angel20= "341-359";

                if (dropDown == 'Pride') {
                    $('#bet_angel1').val(angel1);
                }
                if (dropDown == '1') {
                    $('#bet_angel1').val(angel2);
                }
                if (dropDown == '17') {
                    $('#bet_angel1').val(angel3);
                }
                if (dropDown == '6') {
                    $('#bet_angel1').val(angel4);
                }
                if (dropDown == '12') {
                    $('#bet_angel1').val(angel5);
                }
                if (dropDown == '3') {
                    $('#bet_angel1').val(angel6);
                }
                if (dropDown == '18') {
                    $('#bet_angel1').val(angel7);
                }
                if (dropDown == '9') {
                    $('#bet_angel1').val(angel8);
                }
                if (dropDown == '14') {
                    $('#bet_angel1').val(angel9);
                }
                if (dropDown == '5') {
                    $('#bet_angel1').val(angel10);
                }
                if (dropDown == '8') {
                    $('#bet_angel1').val(angel11);
                }
                if (dropDown == '15') {
                    $('#bet_angel1').val(angel12);
                }
                if (dropDown == '4') {
                    $('#bet_angel1').val(angel13);
                }
                if (dropDown == '19') {
                    $('#bet_angel1').val(angel14);
                }
                if (dropDown == '10') {
                    $('#bet_angel1').val(angel15);
                }
                if (dropDown == '13') {
                    $('#bet_angel1').val(angel16);
                }
                if (dropDown == '2') {
                    $('#bet_angel1').val(angel17);
                }
                if (dropDown == '16') {
                    $('#bet_angel1').val(angel18);
                }
                if (dropDown == '7') {
                    $('#bet_angel1').val(angel19);
                }
                if (dropDown == '11') {
                    $('#bet_angel1').val(angel20);
                }

            })
        });

        // bets_sequence1

        // $(document).ready(function() {
        //     $('#bets_sequence1').change(function() {
        //         var dropDown = $(this).val();
        //         var angel20= "341-359";
        //         if (dropDown == 'Pride') {
        //             $('#bet_angel1').val(angel20);
        //         }

        //     })
        // });
    </script>
    <!-- /.content -->
@endsection
