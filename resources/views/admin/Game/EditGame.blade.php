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
                            <h3 class="card-title">Update Game</h3>
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
                            action="{{ route('game.update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$games->id}}">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">


                                        <div class="form-group">
                                            <label for="game_name">Game name</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="text" name="game_name" class="form-control"
                                                       value="{{$games->game_name}}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            @if ($errors->has('game_name'))
                                                <span class="required">
                                                    <strong>{{ $errors->first('game_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="game_time">Game Time</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="text" name="game_time" class="form-control numbersOnly"
                                                    value="{{$games->game_time}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            @if ($errors->has('game_time'))
                                                <span class="required">
                                                    <strong>{{ $errors->first('game_time') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="game_img">Game Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="game_img" class="form-control"
                                                        >
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            @if ($errors->has('game_img'))
                                                <span class="required">
                                                    <strong>{{ $errors->first('game_img') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <img src="{{asset('storage/GameImg/'.$games->game_img)}}" alt="cursor Img"  width="100" height="100">
                                        </div>

                                        <div class="form-group">
                                            <label for="cursor_img">Cursor Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="cursor_img" class="form-control"
                                                        >
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            @if ($errors->has('cursor_img'))
                                                <span class="required">
                                                    <strong>{{ $errors->first('cursor_img') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <img src="{{asset('storage/GameImg/'.$games->cursor_img)}}" alt="cursor Img"  width="100" height="100">
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
                                            <button id="submit" type="submit" class="btn btn-primary">Update
                                                </button>
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
        // numbers only
        $('.numbersOnly').keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g,'');
        });
    </script>
    <!-- /.content -->
@endsection
