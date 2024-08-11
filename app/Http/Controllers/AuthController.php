<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function showRegisterForm()
    {
        return view('Register');
    }

    public function showMyPosts()
    {
        $posts = Post::where('user_id', auth()->id())->get();
        return view('MyPosts', ['posts' => $posts]);
    }

    public function showCreatePost()
    {
        return view('CreatePost');
    }
}
