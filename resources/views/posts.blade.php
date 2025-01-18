@extends('layouts/main')
@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>

    <div class="row justify-content-center  mb-3">
        <div class="col-md-6">
            <form action="/blog" method="GET">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3 mx-1">
                    <input type="text" class="form-control" placeholder="Search.." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div> 

    
        @if ($posts->count() > 0)
        {{-- Hanya jalankan jika ada elemen dalam koleksi --}}
        <a href="/posts/{{ $posts[0]->slug }}">
            <div class="card mb-3">
                @if ($posts[0]->image)
                    <div style="max-height: 400px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
                    </div>
                @else
                <img src="https://placehold.co/1200x400?text={{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
                @endif
                <div class="card-body text-center">
                    <h3 class="card-title">
                        <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a>
                    </h3>
                    <small class="text-body-secondary">
                        <p>By <a href="/blog?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> in 
                            <a href="/blog?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>
                            {{ $posts[0]->created_at->diffForHumans() }}
                        </p>
                    </small>
                    <p class="card-text">{{ $posts[0]->excerpt }}</p>
                </div>
                <form action="{{ route('post.like', $posts[0]->id) }}" method="POST" style="display: inline;" class="p-2">
                    @csrf
                    <button type="submit" style="border: none; background: none; cursor: pointer;">
                        @if ($posts[0]->likes->contains('user_id', Auth::id()))
                            <i class="fas fa-heart" style="color: red;"></i> <!-- Ikon untuk sudah di-like -->
                        @else
                            <i class="far fa-heart" style="color: gray;"></i> <!-- Ikon untuk belum di-like -->
                        @endif
                    </button>
                    <span>{{ $posts[0]->likes->count() }} Likes</span>
                    <span class="ms-2"> <a href="/posts/{{ $posts[0]->slug }}#komentar"><i class="fa-regular fa-comment"></i> {{ $posts[0]->comments->count() }} Komentar</a></span>
                </form>
            </div>
        </a>
        
    
        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    {{-- Loop ini hanya dijalankan jika koleksi memiliki lebih dari satu elemen --}}
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none text-white">
                                <div class="position-absolute text-white px-3 py-2"
                                     style="background-color: rgba(0,0,0,0.7)">{{ $post->category->name }}</div>
                            </a>
                            
                            @if ($post->image)
                                <a href="/posts/{{ $post->slug }}">
                                    <div style="max-height: 400px; overflow: hidden;">
                                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                                             alt="{{ $post->category->name }}">
                                        {{-- <img src="{{ route('image.displayImage' , $post->image) }}" class="card-img-top"
                                             alt="{{ $post->category->name }}"> --}}
                                    </div>
                                </a>
                            @else
                                <a href="/posts/{{ $post->slug }}">
                                    <img src="https://placehold.co/500x400?text={{ $post->category->name }}" class="card-img-top"
                                    alt="{{ $post->category->name }}">
                                </a>
                            @endif
    
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <small class="text-body-secondary">
                                    <p>By <a href="/blog?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                                        {{ $post->created_at->diffForHumans() }}</p>
                                </small>
                                <p class="card-text">{!! $post->excerpt !!}</p>
                            </div>
                            <form action="{{ route('post.like', $post->id) }}" method="POST" style="display: inline;" class="p-2">
                                @csrf
                                <button type="submit" style="border: none; background: none; cursor: pointer;">
                                    @if ($post->likes->contains('user_id', Auth::id()))
                                        <i class="fas fa-heart" style="color: red;"></i> <!-- Ikon untuk sudah di-like -->
                                    @else
                                        <i class="far fa-heart" style="color: gray;"></i> <!-- Ikon untuk belum di-like -->
                                    @endif
                                </button>
                                <span class="me-2">{{ $post->likes->count() }} Likes</span>
                                <span class="ms-2"> <a href="/posts/{{ $post->slug }}#komentar"><i class="fa-regular fa-comment"></i> {{ $post->comments->count() }} Komentar</a></span>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No Post Found</p>
    @endif
    

    {{ $posts->links() }}
@endsection

