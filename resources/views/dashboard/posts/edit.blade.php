@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Post</h1>
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
                        <h3 class="card-title">Form Edit Post</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="/dashboard/posts/{{ $post->slug}}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control  @error('title') is-invalid @enderror"
                                    id="title" placeholder="Enter Title" name="title" required autofocus
                                    value="{{ old('title',$post->title) }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control  @error('slug') is-invalid @enderror"
                                    id="slug" placeholder="Slug" name="slug" required value="{{ old('slug', $post->slug) }}">
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
                                        @if (old('category_id',$post->category_id) == $category->id)
                                            <option value="{{ $category->id }}"selected> {{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Post Image</label>
                                <input type="hidden" name="oldImage" value="{{ $post->image }}">
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid mb-2 col-sm-5 d-block">
                                    {{-- <img src="{{ route('image.displayImage' , $post->image) }}" class="img-preview img-fluid mb-2 col-sm-5 d-block"> --}}
                                @else
                                    <img class="img-preview img-fluid mb-2 col-sm-5">
                                @endif
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
                                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                                <trix-editor input="body"></trix-editor>
                            </div>


                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="tambahData">Update</button>
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
