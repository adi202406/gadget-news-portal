@extends('layouts/main')
@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>

    <div class="row justify-content-center  mb-3">
        <div class="col-md-6">
            <form action="/daftarHp" method="GET">
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

    @if ($hps->count() > 0)
        {{-- Hanya jalankan jika ada elemen dalam koleksi --}}
        <div class="container">
            <div class="row">
                @foreach ($hps as $hp)
                    {{-- Loop ini hanya dijalankan jika koleksi memiliki lebih dari satu elemen --}}
                    <div class="col-lg-2 mb-3">
                        <div class="card h-100 d-flex flex-column">
                            @if ($hp->image)
                                <a href="/hp/{{ $hp->slug }}">
                                    <div style="max-height: 400px; overflow: hidden;">
                                        <img src="{{ asset('storage/' . $hp->image) }}" class="card-img-top "
                                            alt="{{ $hp->title }}">
                                        {{-- <img src="{{ route('image.displayImage' , $hp->image) }}" class="card-img-top"
                                            alt="{{ $hp->category->name }}"> --}}
                                    </div>
                                </a>
                            @else
                                <a href="/hp/{{ $hp->slug }}">
                                    <img src="https://source.unsplash.com/500x400?/smartphone" class="card-img-top"
                                        alt="{{ $hp->title }}">
                                </a>
                            @endif

                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $hp->title }}</h5>
                                <small class="card-text"> Rp{{ $hp->harga }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">not found</p>
    @endif


    {{ $hps->links() }}
@endsection
