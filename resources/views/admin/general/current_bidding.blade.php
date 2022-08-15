@extends('admin.layouts.app')

@section('content')



<style type="text/css">
#timer{
  color: #e8b00b;
  font-weight: bold;
  text-shadow: 1px 1px red;
  font-size: 25px;
}
#loader{
    position: absolute; */
    z-index: 1;
    width: 100%;
    position: fixed; 
    width: 100%;
    height: 100%;
    z-index: 9999;
}

 .partityresult {

     /* background-color: #7f00ff; */

   width:35px;

   height:35px;

   border-radius:50%;

   

   }

   

    .partityresult:hover {

     background-color: #7f00ff;

   

   }



  .partityresult.red{

    background-color:red;

  }



  .partityresult.violet{

    background-color:#7f00ff;

  }

  .partityresult.green{

    background-color:green;

  }

</style>



<!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link rel="stylesheet" href="https://code.jquery.com/resources/demos/style.css"> -->

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

    <!-- Main content -->

    <section class="content">
        <div id="loader" style="display: none"><img src="{{url('/public/assets/images/loading-animation.gif')}}" ></div>

      <div class="container-fluid">

       <div class="row">

        <div class="col-md-12">

          <div class="card">

              <div class="card-header">

                  <div class="container">
                @if(Session::has('flash_success'))
                  <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_success') }}
                  </div>
                @endif
                @if(Session::has('flash_error'))
                  <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_error') }}
                  </div>
                @endif


                <div class="card-body">
                <div class="row"><div class="col-sm-6"><span>Period : <b id="display_period">{{$current_period->period}}</b></span></div></div>
                <div class="row">
                  <div class="col-sm-6">
                      <form method="POST" action="{{route('manuallyannouncewinner')}}">
                      @csrf
                      <label for="sort" class="control-label"> Select Winner </label>
                        <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <select name="bid_type" class="form-control"> 
                                  <option value="">Select</option>
                                       @for ($i=1; $i<=12; $i++)
                                          <option value="{{$i}}">{{$i}}</option>
                                       @endfor
                                  </select>
                                  <input type="hidden" name="periods" id="period_lst" value="{{$current_period->period}}">
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <button type="submit" class="btn btn-primary">Announce Winner</button>
                            </div>
                        </div>
                      </form>
                  </div>
                  <div class="col-sm-6">
                    <h6><b>Manual Winning</b> @if(!empty($manual_num)) : <button class = "btn btn-default btn-sm partityresult {{$win_color}} "><p style = "color:white;">{{$manual_num}}</p></button> @endif</h6>
                    <div class="row">
                      <div class="col-sm-6"><b>Count Down</b> : <span id="timer"></span>
                        <input id="running_server_time" type="hidden" value=" " />
                      </div>
                    </div>
                  </div>
                </div>
					
					
                <button class="btn btn-primary float-right current_period_bidding" >

                  Refresh</button>

                <table class="table table-bordered">

                  <thead>                  

                    <tr>

                      <th>color</th>

                      <th>no. of persons</th>

                      <th>Total bid amount</th>   

                    </tr>

                  </thead>

                  <tbody id="set_colors">

                    

                  </tbody>

                </table>

              </div> 





                 <div class="card-body">

                 <table class="table table-bordered">

                  

                  <thead>                  

                    <tr>

                      <th>Number</th>

                      <th>No. of Persons</th>

                      <th>Total bid amount</th>

                    </tr>

                  </thead>

                  <tbody id="set_current_period">

                   
                     

                  </tbody>

                </table>

              </div>  

              <!-- /.card-header -->

              

        <!-- /.card -->

        </div>

       </div>

      </div><!-- /.container-fluid -->

    </section>
    
<script type="text/javascript">
  $('.current_period_bidding').on( "click", function() { 
  
    $('#loader').show();
    $.ajax({

        url: '{{ route('current-period-bidding') }}',

        method: "POST",

        dataType: "json",

        async: true,

        data: {_token: '{{ csrf_token() }}'},

        success: function (response) {
            console.log(response);
            $("#loader").hide();
            var users = response.users;
            let current_period_list = response.list_number_data;
            let current_color_list = response.list_colors;
                var bind_data = '';
                $("#set_current_period").html('');

                $.each( current_period_list, function( key, value ) {
                    bind_data += '<tr><td><button class = "btn btn-default btn-sm partityresult '+value.bid_color+' "><p style = "color:white;">'+value.contract_nos+'</p></button></td><td>'+value.no_of_persons+'</td><td>'+value.total_bit_amt+'</td></tr>';
                });
				bind_data += '<tr><td colspan="2"><b>Total amount</b></td><td><b style="font-size: 25px;">'+response.total_num_amount+'</b></td></tr>';
                $("#set_current_period").html(bind_data);
            

            var bind_colors = '';
			var list_clr = [];
			var all_clrs = ['red','green','violet'];
            $("#set_colors").html('');
            $.each( current_color_list, function( key, value ) {
				list_clr.push(value.color);
                bind_colors += '<tr><td><button class = "btn btn-default btn-sm partityresult '+value.color+' "></button></td><td>'+value.no_of_users+'</td><td>'+value.bid_amt+'</td></tr>';
            });
			$.each( all_clrs, function( key, value ) {
				if(list_clr.includes(value)){
				}else{
					bind_colors += '<tr><td><button class = "btn btn-default btn-sm partityresult '+value+' "></button></td><td>0</td><td>0</td></tr>';
				}
			});
          	bind_colors += '<tr><td colspan="2"><b>Total amount</b></td><td><b style="font-size: 25px;">'+response.total_col_amount+'</b></td></tr>';
            $("#set_colors").html(bind_colors);
            $("#display_period").text(response.periods.period);
            $("#period_lst").val(response.periods.period);
            $(".loader").hide();
        },
          error: function(e)
          {        
            $("#loader").hide();
          }



    });

  });
	
  function getperiodId(){

    $.ajax({

      url: '{{ url('getperiodId') }}',

      method: "POST",

      dataType: "json",

      async: true,

      data: {_token: '{{ csrf_token() }}'},

      success: function (response) {

        //debugger;

          let result = response.period_data;

          $('#running_server_time').val(result.running_time); 

          //$('#timer').html(result.running_time);

          CountDown(180-($('#running_server_time').val()),document.getElementById('timer'));

      }

    });

  }

  $(document).ready(function(){
      getperiodId();
  })

  function CountDown(duration, display) {  

    if (!isNaN(duration)) {

      var timer = duration, minutes, seconds;

      var interVal=  setInterval(function () {

        minutes = parseInt(timer / 60, 10);

        seconds = parseInt(timer % 60, 10);



        minutes = minutes < 10 ? "0" + minutes : minutes;

        seconds = seconds < 10 ? "0" + seconds : seconds;

        $(display).html( minutes + "m : " + seconds + "s" );


        if (--timer < 0) {

          timer = duration;

          // SubmitFunction();

          $('#display').empty();

          clearInterval(interVal)

        }

        if(minutes <= 00 && seconds <= 30){

          if(minutes <= 00 && seconds <= 30){ 


          }

        }

        if(minutes == 00 && seconds == 00){ 

           // $('.myBtn').removeClass('disabled'); 

            getperiodId();

            window.location.reload();

        }

      },1000);

    }

  }


    function manuallyannouncewinner(){
        console.log('manually announce winner');
    //   $.ajax({

    //     url: '{{ route('manuallyannouncewinner') }}',

    //     method: "POST",

    //     dataType: "json",

    //     async: true,

    //     data: {_token: '{{ csrf_token() }}'},

    //     success: function (response) {
    //         console.log(response);
           
    //     }



    // }); 
    }
  </script>

@endsection

