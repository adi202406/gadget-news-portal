@extends('layouts/main')

@section('container')
    <div class="container post">
        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                @include('sweetalert::alert')
                <h2>{{ $post->title }}</h2>
                <h5>{{ $post->penulis }}</h5>

                <p>By. <a href="/blog?author={{ $post->author->username }}">{{ $post->author->name }}</a> | <a
                        href="/blog?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>

                @if ($post->image)
                    <div style="max-height: 400px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                            alt="{{ $post->category->name }}">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top"
                        alt="{{ $post->category->name }}">
                @endif

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>
                @auth

                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}"> <!-- Input hidden untuk post_id -->
                        <div class="mb-3">
                            <label for="comment" class="form-label">Tambahkan Komentar:</label>
                            <textarea class="form-control" id="comment" name="content" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                @endauth

                <div id="komentar">
                    <!-- Menampilkan daftar komentar -->
                    <h4 class="mt-5">Komentar:</h4>
                    <hr>
                    @if ($post->comments()->count() > 0)
                        @foreach ($post->comments as $comment)
                            <div>
                                <div>
                                    @if ($comment->user)
                                        @if (!isset($comment->comment_id))
                                            <p class="text-capitalize d-inline" style="font-size: 1.2em;">
                                                {{ $comment->user->name }}</p> <small class="d-inline">
                                                {{ $comment->created_at->diffForHumans() }}</small>
                                            <p class="card-text">{{ $comment->content }}</p>
                                            <!-- Komentar memiliki comment_id -->
                                            {{-- <p>Like: {{ $comment->likes_count }}</p> <!-- Menampilkan jumlah like --> --}}
                                        @endif
                                    @endif


                                    @if (!isset($comment->comment_id))
                                        @auth
                                            <div>
                                                @if (Auth::check() && $comment->user_id == Auth::user()->id)
                                                    <!-- Tombol untuk menampilkan/menyembunyikan formulir edit -->
                                                    <button onclick="toggleEditForm({{ $comment->id }})"
                                                        class="button border-0 bg-warning rounded-1"><i
                                                            class="fas fa-pencil-alt"></i> Edit</button>
                                                    <!-- Tombol untuk menampilkan/menyembunyikan formulir balas -->
                                                    <form action="{{ route('comments.destroy', $comment) }}" method="POST"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="button border-0 bg-danger rounded-1"
                                                            onclick="deleteConfirm(event)" id="delete"><i
                                                                class="fas fa-trash-alt"></i> Hapus</button>
                                                    </form>
                                                @endif
                                                <button onclick="toggleReplyForm({{ $comment->id }})"
                                                    class="button border-0 bg-primary rounded-1"><i class="fas fa-reply"></i>
                                                    Balas</button>
                                                <!-- Tombol untuk menampilkan/menyembunyikan formulir edit -->
                                                <!-- Tombol untuk menghapus komentar -->
                                            </div>
                                            <!-- Formulir untuk mengedit komentar (awalnya disembunyikan) -->
                                            <form id="editForm_{{ $comment->id }}"
                                                action="{{ route('comments.update', $comment) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('PUT')
                                                <textarea name="content" rows="3" class="mt-2 border-0 rounded-1 d-block" style="width: 500px; color:black;">{{ $comment->content }}</textarea>
                                                <button type="submit"
                                                    class="mt-2 border-0 bg-success rounded-1">Submit</button>
                                            </form>
                                            <!-- Formulir untuk balas komentar (awalnya disembunyikan) -->
                                            <!-- Formulir untuk balas komentar (awalnya disembunyikan) -->
                                            <form id="replyForm_{{ $comment->id }}"
                                                action="{{ route('comments.reply', $comment) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                <!-- Input hidden untuk comment_id -->
                                                <div class="mb-3">
                                                    <label for="reply" class="form-label">Balas Komentar:</label>
                                                    <textarea class="form-control" id="reply" name="content" rows="3"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                            <hr>
                                        @endauth
                                    @endif
                                </div>
                                <!-- Tampilkan balasan komentar -->
                                @if ($comment->replies->count() > 0)
                                    <h5 class="ms-4">Balasan:</h5>
                                @else
                                    <p class="d-none"></p>
                                @endif
                                @foreach ($comment->replies as $reply)
                                    <div class="reply ms-4">
                                        <hr>
                                        <p class="text-capitalize d-inline" style="font-size: 1.2em;">
                                            {{ $reply->user->name }}</p> <small class="d-inline">
                                            {{ $reply->created_at->diffForHumans() }}</small>
                                        <p>{{ $reply->content }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                        {{-- {{ $comments->links() }} <!-- Menampilkan link pagination --> --}}
                    @else
                        <p>Belum ada komentar untuk postingan ini.</p>
                    @endif
                </div>




                <a href="/blog" class="mt-3 mb-3 d-block"><i class="fa-solid fa-backward"></i> BACK</a>
            </div>
        </div>
    </div>

@endsection

<script>
    function toggleEditForm(commentId) {
        var editForm = document.getElementById('editForm_' + commentId);
        if (editForm.style.display === 'none') {
            editForm.style.display = 'block';
        } else {
            editForm.style.display = 'none';
        }
    }

    function toggleReplyForm(commentId) {
        var replyForm = document.getElementById('replyForm_' + commentId);
        if (replyForm.style.display === 'none') {
            replyForm.style.display = 'block';
        } else {
            replyForm.style.display = 'none';
        }
    }

    window.deleteConfirm = function(e) {
        e.preventDefault();
        var form = e.target.form;
        swal({
                title: "Apa yakin Komentar mau dihapus?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    }
</script>
