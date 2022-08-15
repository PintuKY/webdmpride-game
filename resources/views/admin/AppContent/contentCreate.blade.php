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
                            <h3 class="card-title">Create Content</h3>
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
                            action="{{ route('admin.content.store') }}">
                            @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">


                                        <div class="form-group">
                                            <label for="con_type">Content Type</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                        <select name="con_type" id="" class="form-control">
                                                            <option value="">Select Content Type</option>
                                                            <option value="About Us">About Us</option>
                                                            <option value="How to Play">How to Play</option>
                                                            <option value="Rules">Rules</option>
                                                        </select>
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
                                                <textarea name="app_content" id="" cols="50" rows="10"  class="form-control" placeholder="Enter Your Content"></textarea>
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
                                            <button id="submit" type="submit" class="btn btn-primary">Create
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
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        // $('.ckeditor').ckeditor();
        CKEDITOR.replace('editor1');
        CKEDITOR.config.width="100%";
        });
    </script>
    <script>
        // numbers only
        $('.numbersOnly').keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g,'');
        });
    </script>
    <!-- /.content -->
@endsection

