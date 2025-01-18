<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likePost($id)
    {
        $post = Post::findOrFail($id);
        $like = Like::where('post_id', $post->id)->where('user_id', Auth::id())->first();

        if ($like) {
            // Jika sudah di-like, batalkan like
            $like->delete();
        } else {
            // Jika belum di-like, tambahkan like
            Like::create([
                'post_id' => $post->id,
                'user_id' => Auth::id(),
            ]);
        }

        return redirect()->back();
    }
}
