@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Posts') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="alert alert-info">
                        Posts
                    </div>

                    <div class="card">
                        <div class="card-body p-0">

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>title</th>
                                    <th>body</th>
                                    @can('manage')
                                        <th>Actions</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts ?? [] as $post)
                                    <tr>
                                        <td>{{ $post['title'] }}</td>
                                        <td>{{ $post['body'] }}</td>
                                        @can('manage')
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <form class="mx-2" method="POST" onsubmit="return confirm('Are you sure ?')"
                                                          action="{{route('post.delete',['id'=>$post['id']])}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Remove</button>
                                                    </form>
                                                    <form class="mx-2" action="{{route('post.comments',['id'=>$post['id']])}}">
                                                        <button type="submit" class="btn btn-primary">Comments
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
