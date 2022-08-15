@extends('admin.layouts.app')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
         <!--     <li class="breadcrumb-item"><a href="index.html">Home</a></li> -->
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
                 <div class="small-box bg-info">
                    <div class="inner">

                      <h3>{{count($total_members)}}</h3>

                      <p>Total Members</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                     <a href="{{url('/admin/customers')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>

              <div class="col-lg-3 col-6">
                  <div class="small-box bg-success">
                    <div class="inner">
                      <h3>{{count($total_withdrw_amt)}}<sup style="font-size: 20px"> </sup></h3>

                      <p>Total withdrawal</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                     <a href="{{url('/admin/total-withdrawals')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>

              <!-- <div class="col-lg-3 col-6">
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3></h3>

                      <p>Total Balace</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div> -->

              <!-- <div class="col-lg-3 col-6">
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3>{{count($total_members)}}</h3>

                      <p>Total Member Amount</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div> -->
                    <!-- <a href="" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a> -->
                 <!--  </div>
              </div> -->

            <div class="col-lg-3 col-6">
                 <div class="small-box bg-info">
                    <div class="inner">
                      {{-- <h3>{{$totalwallet}}</h3> --}}
                      <p>Total Invested Amount</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                     <a href="{{url('/admin/total-members')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>

              <div class="col-lg-3 col-6">
                  <div class="small-box bg-success">
                    <div class="inner">
                      {{-- <h3>{{$withdrawal}}<sup style="font-size: 20px"> </sup></h3> --}}

                      <p>Withdrwal Account</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                     <a href="{{url('/admin/total-withdrawals')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>

              <!-- <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>4</h3>

                    <p>  Total Audio Upload </p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
               -->




              <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                  <div class="inner">
                    {{-- <h3>{{$balance}}</h3> --}}

                    <p> Total Balance </p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                   <!--<a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
              </div>
        </div>
      </div>
    </section>
@endsection
