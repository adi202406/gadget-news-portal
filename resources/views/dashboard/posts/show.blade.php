@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-lg-8 my-3">
                <h2>{{ $post->title }}</h2>
                <h5>{{ $post->penulis }}</h5>

                <div class="cont-btn mb-2">
                    <a href="/dashboard/posts" class="btn btn-success ">
                        <span>
                            <i class="fa-solid fa-arrow-left"></i></span>
                        Back
                    </a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning mx-2">
                        <span>
                            <i class="fa-solid fa-pen-to-square"></i></span>
                        Edit
                    </a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger " onclick="deleteConfirm(event)" id="delete"> <span><i
                                    class="fa-solid fa-trash"></i>
                            </span>Delete</button>
                    </form>

                </div>

                @if ($post->image)
                <div style="max-height: 400px; overflow: hidden;">

                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                    alt="{{ $post->category->name }}">
                    {{-- <img src="{{ route('image.displayImage' , $post->image) }}" class="card-img-top"
                    alt="{{ $post->category->name }}"> --}}
                </div>
                @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top"
                    alt="{{ $post->category->name }}">
                @endif

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>

            </div>
        </div>
    </div>
@endsection
