@extends('admin.layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Games</h3>
                            @if ($games)
                                <button class="btn btn-secondary float-right"><i class="fa fa-lock" aria-hidden="true"></i> Create</button>

                            @else
                                <a href="{{ route('game.form') }}" class="btn btn-primary float-right">Create</a>
                            @endif
                            {{-- <a href="{{ route('game.form') }}" class="btn btn-primary float-right">Create</a> --}}
                        </div>
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <!-- /.card-header -->
                        {{-- <div class="card-body">

                            <table class="table table-bordered">
                                <div style="background-color: #D4AF37;padding:10px"><b>Sum Type</b> </div>
                                <div class="row">

                                </div>
                            </table>

                            <br>
                        </div> --}}
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Game Image</th>
                                        <th>Cursor Image</th>
                                        <th>Time</th>
                                        <th>Game Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($games)
                                        <tr>
                                            @if ($games->game_img)
                                                <td>
                                                    <img src="{{asset('storage/GameImg/'.$games->game_img)}}" alt="Game Img"  width="200" height="200">

                                                    {{-- <a href="">Change</a> --}}
                                                    {{-- <div class="form-group">
                                                        <label for="game_img">Game Image</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="game_img" class="form-control"
                                                                    >
                                                            </div>
                                                        </div><br>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <button type="button" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </td>
                                            @else
                                            <td>
                                                {{-- <div class="form-group">
                                                    <label for="game_img">Game Image</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="game_img" class="form-control"
                                                                >
                                                        </div>
                                                    </div>
                                                </div> --}}

                                            </td>
                                            @endif

                                            <td>
                                                <img src="{{asset('storage/GameImg/'.$games->cursor_img)}}" alt="cursor Img"  width="100" height="100">

                                                {{-- <a href="">Change</a> --}}
                                            </td>
                                            <td>{{$games->game_time}} Minutes</td>
                                            <td>{{$games->game_name}}</td>
                                            <td>@if ($games->status == 1)
                                                Active
                                                @else
                                                Inactive
                                                @endif
                                            </td>
                                            <td><a href="{{route('game.edit',['id'=>$games->id])}}">
                                                <button type="button" class="btn btn-primary">Edit</button>
                                            </a></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <br>
                        </div>

                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
