<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Hp;

class HpController extends Controller
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

        return view('daftarhp', [
            "title"=> "Smartphone" .$title,
            "active" => 'hp',
            "hps"=> Hp::latest()->filter(request(['search','category', 'author']))->paginate(12)->withQueryString(),
            "categories" => $categories,
        ]);
    }

    public function show (\App\Models\Hp $hp)
    {
        $categories = Category::all();
        return view('singlehp', [
            "title" => "Single Post",
            "active" => 'hp',
            "hp" => $hp,
            "categories" => $categories
        ]);
    }
}


