@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Welcome to Post Phone</h1>
                    </div><!-- /.col -->

                    @include('sweetalert::alert')
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Post Phone</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="row justify-content-center">
            <div class="col">
                <div class="table-responsive small">
                    <a href="/dashboard/hp/create" class="btn  bg-gradient-primary mb-2">
                        <span><i class="fa-solid fa-plus"></i></span>
                        New Post</a>
                    <table class="table table-striped table-sm ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hps as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <a href="/dashboard/hp/{{ $post->slug }}" class="btn btn-info border-0 mb-1">
                                            <span><i class="fa-solid fa-eye"></i>
                                            </span>
                                        </a>
                                        <a href="/dashboard/hp/{{ $post->title }}/edit"
                                            class="btn btn-warning border-0 mb-1">
                                            <span><i class="fa-solid fa-pen-to-square"></i>
                                            </span>
                                        </a>

                                        <form action="/dashboard/hp/{{ $post->slug }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger border-0" onclick="deleteConfirm(event)"
                                                id="delete"> <span><i class="fa-solid fa-trash mb-1"></i>
                                                </span></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{ $hps->links() }}
    
@endsection
