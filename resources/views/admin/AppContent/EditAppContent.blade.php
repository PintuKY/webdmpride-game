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
                            <h3 class="card-title">Update App Content</h3>
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
                            action="{{ route('content.update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$content->id}}">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">


                                        <div class="form-group">
                                            <label for="con_type">Content Type</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="text" name="con_type" class="form-control"
                                                       value="{{$content->con_type}}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            @if ($errors->has('con_type'))
                                                <span class="required">
                                                    <strong>{{ $errors->first('con_type') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="app_content">Content</label>
                                            <div class="input-group">
                                                <textarea name="app_content" id="" cols="50" rows="10"  class="form-control" placeholder="Enter Your Content">{{$content->app_content}}</textarea>
                                            </div>
                                        </div>
                                        <div>
                                            @if ($errors->has('app_content'))
                                                <span class="required">
                                                    <strong>{{ $errors->first('app_content') }}</strong>
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
