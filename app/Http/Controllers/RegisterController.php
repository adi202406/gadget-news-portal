<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;


class RegisterController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register',
            "categories" => $categories
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:3', "max:255", 'unique:users'],
            'email' => ['required','email:dns','unique:users'],
            'password' => ['required', 'min:5', 'max:255']
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);
        $request->session()->flash('success', 'Registration succesfull, Please Login');
        return redirect('/login');
    }
}
