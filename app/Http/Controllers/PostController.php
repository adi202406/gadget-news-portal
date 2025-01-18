<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;

class PostController extends Controller
{
    public function index()
    {
         // Ambil semua kategori
        $categories = Category::all();
        $title= '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' By ' . $author->name;
        }

        return view('posts', [
            "title"=> "All Post" .$title,
            "active" => 'posts',
            "posts"=> Post::latest()->filter(request(['search','category', 'author']))->paginate(7)->withQueryString(),
            "categories" => $categories
        ]);
    }

    public function show (\App\Models\Post $post)
    {
        $user = User::all();
        $categories = Category::all();
        $comment = Comment::all();
        return view('post', [
            "title" => "Single Post",
            "active" => 'posts',
            "post" => $post,
            "categories" => $categories,
            'user' => $user,
            'comment' => $comment
            // 'comments' => Comment::latest()->paginate(3)
        ]);
    }
}


