@extends('admin.layouts.app')
@section('content')
<section class="content">
    <div class="container-fluid">
     <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Bet</h3>
              <a href="{{route('bet.form')}}" class="btn btn-primary float-right">Create</a>
            </div>
            @if(Session::has('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                {{ Session::get('success') }}
                </div>
            @endif
            <!-- /.card-header -->
            <div class="card-body">

                <table class="table table-bordered">
                   <div style="background-color: #D4AF37;padding:10px"><b>Sum Type</b> </div>
                    <div class="row">
                        @foreach ($sum_type as $sum)
                            <div class="col-sm-3">
                                <div style=" color: {{$sum->bets_color}};border: 2px solid {{$sum->bets_color}};text-align:center;padding:10px;margin:10px; "><b>{{$sum->bets_sequence}}</b></div>

                                <div  style="text-align: center">* {{$sum->bets_odds}}
                                        <a href="{{route('bet.edit',['id'=>$sum->id])}}">Edit</a>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </table>


                <table class="table table-bordered">
                    <div style="background-color: #D4AF37;padding:10px"><b>Sum Numbers</b> </div>
                     <div class="row">
                         @foreach ($num_type as $num_types )
                             <div class="col-sm-3">
                                 <div style="border: 2px solid {{$num_types->bets_color}};text-align:center;padding:10px;margin:10px;color: {{$num_types->bets_color}}"><b> {{$num_types->bets_numbers}}</b></div>
                                 <div  style="text-align: center">* {{$num_types->bets_odds}}
                                    <a href="{{route('bet.edit',['id'=>$num_types->id])}}">Edit</a>
                                </div>

                             </div>
                         @endforeach
                     </div>
                 </table>






              {{-- <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Sum Type</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($sum_type as $sum)
                    <tr>
                        <td style="border-color:{{$sum->bets_color}} ">{{$sum->bets_sequence}}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table> --}}

              {{-- <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Sum Numbers</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($num_type as $num_types )
                    <tr>
                        <td style="border-color:{{$num_types->bets_color}} ">{{$num_types->bets_numbers}}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table> --}}



              <br>
              {{-- {!! $data->links() !!} --}}
            </div>
            <!-- /.card-body -->

      </div>
      <!-- /.card -->
      </div>
     </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection
