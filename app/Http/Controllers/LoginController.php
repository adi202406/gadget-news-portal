<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Models\Category;

class LoginController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('login.index',[
            'title' => 'login',
            'active' => 'login',
            "categories" => $categories
        ]);
    }

    public function logAuth(Request $request )
    {
        $loginData = $request->validate([
            'email'=> ['required', 'email:dns'],
            'password' => ['required', '']
        ]);

        if(Auth::attempt($loginData)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        

        return back()->with('loginError', 'login gagal');
    }

    public function logout()
    {
        Auth::logout();
 
        request()->session()->invalidate();
    
        request()->session()->regenerateToken();
    
        return redirect('/');
    }
}
