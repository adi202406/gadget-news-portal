<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;


class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        // $posts = Post::all();
        // $categories = [];
        // foreach($posts as $post){
        // $categories[] = $post->category->name;
        // }
        // dd($categories);
        return view('dashboard.posts.index',[
            'posts' => Post::where('user_id', auth()->user()->id)->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validateData = $request->validate([
            'title' => ['required', 'max:255'],
            'slug' => ['required', 'unique:posts'],
            'category_id' => ['required'],
            'image' => ['image','file','max:2048'],
            'body' => ['required']
        ]);

        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('post-images');
            // $img = $request->file('image')->store('post-images');
            // $imgSplit = explode('/', $img);
            // $validateData['image'] = $imgSplit[1];
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validateData);

        return redirect('/dashboard/posts')->with('success', 'Post Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show',[
            'post' => $post,
            // 'title' => $post->title
        ]);
    } 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules =[
            'title' => ['required', 'max:255'],
            'category_id' => ['required'],
            'image' => ['image','file','max:1024'],
            'body' => ['required']
        ];

        

        if($request->slug != $post->slug){
            $rules['slug'] = ['required','unique:posts'];
        }

        $validateData =  $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('post-images');
            // $img = $request->file('image')->store('post-images');
            // $imgSplit = explode('/', $img);
            // $validateData['image'] = $imgSplit[1];
        }


        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::where('id', $post->id)
            ->update($validateData);

        return redirect('/dashboard/posts')->with('success', 'Post Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->image){
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post Berhasil Dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()-> json(['slug' => $slug]);
    }
}


