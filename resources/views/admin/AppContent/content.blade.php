@extends('admin.layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">App Content</h3>
                            <a href="{{ route('admin.content') }}" class="btn btn-primary float-right">Create</a>
                        </div>
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <!-- /.card-header -->

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($app_contents)
                                        @foreach ($app_contents as $app_content)
                                            <tr>
                                                <td>{{$app_content->con_type}}</td>
                                                <td>{{$app_content->app_content}}</td>
                                                <td>
                                                    @if ($app_content->status != 0)
                                                        Active
                                                        @else
                                                        Inactive
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('content.edit',['id'=>$app_content->id])}}">
                                                        <button type="button" class="btn btn-primary">Edit</button>
                                                    </a>

                                                </td>
                                            </tr>
                                        @endforeach
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
