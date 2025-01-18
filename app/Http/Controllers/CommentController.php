<?php

// app/Http/Controllers/CommentController.php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'content' => 'required',
        ]);
    
        // Pastikan post_id tidak null sebelum menyimpan komentar
        if (!$request->has('post_id')) {
            return back()->withErrors('Post ID is required.'); // Atau tindakan yang sesuai untuk menangani post_id null
        }
    
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $request->post_id;
        $comment->content = $request->content;
        $comment->save();
    
        return redirect()->back()->with('success', 'Comment added successfully.');
    }
    

    public function update(Request $request, Comment $comment)
{
    $request->validate([
        'content' => 'required',
    ]);

    $comment->content = $request->content;
    $comment->save();

    if ($request->ajax()) {
        return response()->json(['success' => 'Comment updated successfully.']);
    }

    return redirect()->back()->with('success', 'Comment updated successfully.');
}


    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }

    public function like($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->likes()->create(['user_id' => auth()->user()->id]);

        return redirect()->back()->with('success', 'Comment liked successfully.');
    }

    public function unlike($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->likes()->where('user_id', auth()->user()->id)->delete();

        return redirect()->back()->with('success', 'Comment unliked successfully.');
    }

        public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    public function reply(Request $request, Comment $comment)
    {
        // dd($comment);
        // Validasi input
        $request->validate([
            'content' => 'required|string',
        ]);
    
        // Pastikan ada comment_id dalam request
        if (!$request->has('comment_id')) {
            return back()->withErrors('Comment ID is required.'); // Atau tindakan yang sesuai untuk menangani comment_id null
        }
    
        // Buat komentar baru untuk balasan
        $reply = new Comment();
        $reply->user_id = auth()->user()->id; // Gunakan ID pengguna yang sedang masuk
        $reply->post_id = $comment->post_id; // Gunakan ID postingan yang sesuai
        $reply->comment_id = $request->comment_id; // Tentukan ID komentar yang dijawab sebagai parent_id
        $reply->content = $request->content;
        $reply->save();
    
        // Redirect atau lakukan tindakan yang sesuai, seperti menampilkan pesan sukses
        return redirect()->back()->with('success', 'Komentar berhasil dibalas.');
    }
    

}

