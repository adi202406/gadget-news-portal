@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create New Post </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">New Post</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="row">
            <div class="col">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Add Post</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="/dashboard/posts" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control  @error('title') is-invalid @enderror"
                                    id="title" placeholder="Enter Title" name="title" required autofocus
                                    value="{{ old('title') }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control  @error('slug') is-invalid @enderror"
                                    id="slug" placeholder="Slug" name="slug" required value="{{ old('slug') }}">
                                @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="custom-select form-control-border" id="category" name="category_id">
                                    @foreach ($categories as $category)
                                        @if (old('category_id') == $category->id)
                                            <option value="{{ $category->id }}"selected> {{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                          

                            <div class="form-group">
                                <label for="image">Post Image</label>
                                <img class="img-preview img-fluid mb-2 col-sm-5">
                                <input class="form-control px-1 py-1 d-block @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                                 
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                
                            </div>


                            <div class="">
                                <label for="body">Body</label>
                                @error('body')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                                <trix-editor input="body"></trix-editor>
                            </div>


                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="tambahData">Submit</button>
                        </div>

                        
                    </form>
                </div>
                <!-- /.card -->
                
            </div>
        </div>
    </div>
    
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });


        window.addEventListener("trix-file-accept", function(event) {
            event.preventDefault()
            alert("File attachment not supported!")
        })

    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload =function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }        
    </script>
@endsection
