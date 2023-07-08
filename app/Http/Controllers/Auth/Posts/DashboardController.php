<?php

namespace App\Http\Controllers\Auth\Posts;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $comments = Comment::all();
        $categories = Category::all();
        $user = User::all();
        return view('auth.posts.Dashboard' , compact('posts', 'comments' , 'categories','user'));
    }
}
