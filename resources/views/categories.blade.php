@extends('layouts/main')
@section('container')
    <h1 class="mb-5 text-center"> Post Categories</h1>

    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <a href="/blog?category={{ $category->slug }}">
                        <div class="card text-bg-dark category">
                            <img src="https://source.unsplash.com/500x500?{{ $category->name }}" class="card-img"
                                alt="{{ $category->name }}">
                            <div class="overlay"></div> <!-- Overlay untuk efek hover -->
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title judul text-center flex-fill p-4 py-5 fs-3">{{ $category->name }}</h5>
                            </div>
                        </div>
                    </a>

                </div>
            @endforeach
        </div>
    </div>
@endsection
